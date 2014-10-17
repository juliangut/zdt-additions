module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        phplint: {
            options: {
                swapPath: '/tmp'
            },
            application: ['src/*.php']
        },
        phpcs: {
            options: {
                bin: './vendor/bin/phpcs',
                standard: './phpcs.xml'
            },
            application: {
                dir: ['./src']
            }
        },
        phpmd: {
            options: {
                bin: './vendor/bin/phpmd',
                rulesets: './phpmd.xml',
                reportFormat: 'text'
            },
            application: {
                dir: './src'
            }
        },
        phpdcd: {
            options: {
                bin: './vendor/bin/phpdcd'
            },
            application: {
                dir: ['src']
            }
        }
    });

    grunt.registerTask('default', ['phplint', 'phpcs', 'phpmd', 'phpdcd']);
};
