let webpack = require('webpack');
let path = require('path');

module.exports = {

	entry: './resources/assets/js/app.js',

	output: {
		path: path.resolve(__dirname, 'public/js'),
		filename: 'app.js',
		publicPath: './public'
	},
	
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader',
				options: {
					loaders: {
						'scss': 'vue-style-loader!css-loader!sass-loader',
            			'sass': 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
					}
				}
				
			},
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/
			}
		]
	},
	
	resolve: {
	  alias: {
	    'vue$': 'vue/dist/vue.common.js'
	  }
	},

	performance: {
		hints: false
	},
	
	plugins: []

};

if (process.env.NODE_ENV  === 'production') {

	module.exports.plugins.push(

		new webpack.optimize.UglifyJsPlugin({

			sourceMap: true,

			compress: {
				warnings: false
			}

		})

	);

}

