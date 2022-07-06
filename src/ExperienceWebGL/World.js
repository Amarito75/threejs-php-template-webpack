export default class World
{
    constructor()
    {
       /**
        * Scene
        */
        const scene = new THREE.Scene()
        console.log(scene)
        /**
         * Sizes
         */
        const sizes = {}
        sizes.width = window.innerWidth
        sizes.height = window.innerHeight
        
        /**
         * Resize
         */
        window.addEventListener('resize', () =>
        {
            //Update sizes object
            sizes.width = window.innerWidth
            sizes.height = window.innerHeight

            // Update camera
            camera.aspect = sizes.width / sizes.height
            camera.updateProjectionMatrix()

            // Update renderer
            renderer.setSize(sizes.width, sizes.height)

        })

        /**
         * Camera
         */

        //Base camera
        const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height)
        camera.position.z = 3
        scene.add(camera)

        /**
         * Lights
         */
        const light = new THREE.AmbientLight( 0x404040 )
        scene.add( light )

    }
}