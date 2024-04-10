const Encore = require("@symfony/webpack-encore");

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It"s useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath("public/build/")
    // public path used by the web server to access the output path
    .setPublicPath("/build")
    // Configs
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    // uncomment to enable build popup
    //.enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    // enables and configure @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = "usage";
        config.corejs = "3.23";
    })
    // uncomment if you"re having problems with a jQuery plugin
    //.autoProvidejQuery()

    // SCSS & Main Script
    .addEntry("app", "./assets/app.js")
    // Patient's Script
    .addEntry("patient", "./assets/patient.js")
    // Evolution's Script
    .addEntry("evolution", "./assets/evolution.js")
;

module.exports = Encore.getWebpackConfig();
