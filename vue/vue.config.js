const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
})
const webpack = require('webpack')

module.exports = {
  configureWebpack: {
    plugins: [
      new webpack.DefinePlugin({
        'process.env': {
          BASE_URL_API: JSON.stringify(process.env.BASE_URL_API),
        }
      })
    ]
  }
}
