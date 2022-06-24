const path = require('path')
const LiveReloadPlugin = require('webpack-livereload-plugin')

module.exports = {
    mode: 'development',
    entry: path.resolve(__dirname, '../src/index.js'),
    output:
    {
        path: path.resolve(__dirname, '../assets/js'),
        filename: 'bundle.js',
    },
    plugins:
    [
        new LiveReloadPlugin()
    ],
    watch: true,
}