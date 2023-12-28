
mapboxgl.accessToken = 'pk.eyJ1IjoidHJhZGVkbWVkaWEiLCJhIjoiY2tvYjNoaTV6MDR4eDJvbzI5NDBzNTltdiJ9.0SL_APVAwIlAIJO17FaZXA';
const map = new mapboxgl.Map({
    container: 'map-container',
    style: 'mapbox://styles/mapbox/standard',
    center: [73.38342044855642, 18.77749495535647], // Set the initial center based on the first feature
    zoom: 5
});

map.on('load', () => {
    // Initialize an array to store GeoJSON features
    var geojsonFeatures = villaData.map(element => {
        return {
            type: "Feature",
            properties: {
                id: element.id,
                villa_name: element.name,
                price_per_night: element.price_per_night
            },
            geometry: {
                type: "Point",
                coordinates: [element.longitude, element.latitude]
            }
        };
    });

    map.addSource('villas', {
        type: 'geojson',
        data: {
            type: 'FeatureCollection',
            features: geojsonFeatures
        },
        cluster: true,
        clusterMaxZoom: 14,
        clusterRadius: 50
    });
    map.addLayer({
        id: 'clusters',
        type: 'circle',
        source: 'villas',
        filter: ['has', 'point_count'],
        paint: {
            'circle-color': [
                'step',
                ['get', 'point_count'],
                '#51bbd6',
                100,
                '#f1f075',
                750,
                '#f28cb1'
            ],
            'circle-radius': [
                'step',
                ['get', 'point_count'],
                20,
                100,
                30,
                750,
                40
            ]
        }
    });

    map.addLayer({
        id: 'cluster-count',
        type: 'symbol',
        source: 'villas',
        filter: ['has', 'point_count'],
        layout: {
            'text-field': ['get', 'point_count_abbreviated'],
            'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
            'text-size': 12
        }
    });

    map.addLayer({
        id: 'unclustered-point',
        type: 'circle',
        source: 'villas',
        filter: ['!', ['has', 'point_count']],
        paint: {
            'circle-color': '#11b4da',
            'circle-radius': 4,
            'circle-stroke-width': 1,
            'circle-stroke-color': '#fff'
        }
    });

    // Handle click events on clusters
    map.on('click', 'clusters', (e) => {
        const features = map.queryRenderedFeatures(e.point, {
            layers: ['clusters']
        });
        const clusterId = features[0].properties.cluster_id;
        map.getSource('villas').getClusterExpansionZoom(
            clusterId,
            (err, zoom) => {
                if (err) return;

                map.easeTo({
                    center: features[0].geometry.coordinates,
                    zoom: zoom
                });
            }
        );
    });

    // Handle click events on unclustered points
    map.on('click', 'unclustered-point', (e) => {
        const coordinates = e.features[0].geometry.coordinates.slice();
        const villaName = e.features[0].properties.villa_name;
        const pricePerNight = e.features[0].properties.price_per_night;

        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(`${villaName}<br>Price/Night : ₹ ${pricePerNight}`)
            .addTo(map);
    });

    // Change cursor on hover
    map.on('mouseenter', 'clusters', () => {
        map.getCanvas().style.cursor = 'pointer';
    });
    map.on('mouseleave', 'clusters', () => {
        map.getCanvas().style.cursor = '';
    });
});
