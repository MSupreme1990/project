'use strict';

const path = require('path');
const webpack = require('webpack');
const WatchMissingNodeModulesPlugin = require('react-dev-utils/WatchMissingNodeModulesPlugin');
const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');

module.exports = {
    devtool: 'eval',
    target: 'web',
    context: __dirname + '/src',
    entry: {
        bundle: [
            // We ship a few polyfills by default:
            require.resolve('./polyfills'),
            './index'
        ]
    },
    output: {
        path: __dirname + '/../public/js',
        filename: '[name].js',
        publicPath: '/bundles/app/',
    },
    plugins: [
        new webpack.DefinePlugin({
            'process.env': { NODE_ENV: JSON.stringify(process.env.NODE_ENV || 'development') }
        }),
        new CaseSensitivePathsPlugin,
        new WatchMissingNodeModulesPlugin(path.resolve(__dirname, 'node_modules')),
    ].concat(process.env.NODE_ENV === 'production' ? [
            new webpack.NoEmitOnErrorsPlugin(),
            new webpack.optimize.UglifyJsPlugin({
                compress: {
                    screw_ie8: true, // React doesn't support IE8
                    warnings: false
                },
                mangle: {
                    screw_ie8: true
                },
                output: {
                    comments: false,
                    screw_ie8: true
                }
            })
        ] : []),
    module: {
        loaders: [
            {
                enforce: 'pre',
                test: /\.(js|jsx)$/,
                loader: 'eslint-loader',
                include: path.resolve(__dirname, './src')
            },
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                query: {
                    // This is a feature of `babel-loader` for webpack (not Babel itself).
                    // It enables caching results in ./node_modules/.cache/babel-loader/
                    // directory for faster rebuilds.
                    cacheDirectory: true
                }
            },
            {
                test: /\.json$/,
                loader: "json-loader"
            }
        ]
    },
    resolve: {
        modules: ['node_modules', './src'],
        extensions: ['.json', '.js', '.jsx']
    }
};
