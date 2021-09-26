const path = require('path');


module.exports = {
    entry: {
        SmartTable: './resources/js/SmartTable.js',
        header: './resources/js/header.js'
    },

    output: {
        path: path.resolve('./public/js/'),
        filename: '[name].js'
    },

    module: {

        rules: [{
            test: /\.js$/,
            loader: 'babel-loader'
        }]
        
    }
}