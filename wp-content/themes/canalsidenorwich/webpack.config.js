const path = require( 'path' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );

module.exports = {
	entry: './assets/js/app.js',
	output: {
		filename: 'script.js',
		path: path.resolve( __dirname, '.' )
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract( {
					fallback: 'style-loader',
					use: ['css-loader', 'sass-loader']
				} )
			}
		]
	},
	plugins: [
		new ExtractTextPlugin( 'style.css' )
	]
};
