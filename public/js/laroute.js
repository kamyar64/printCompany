(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"about","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\UserController@create"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\UserController@storeLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":"logout","action":"App\Http\Controllers\UserController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\UserController@registerForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/add\/{a}\/{b}","name":null,"action":"\PrintCompany\AdminBundle\Controller\AdminBundleController@add"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/subtract\/{a}\/{b}","name":null,"action":"\PrintCompany\AdminBundle\Controller\AdminBundleController@subtract"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin","action":"PrintCompany\AdminBundle\Controller\AdminBundleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pagination","name":"pagination","action":"PrintCompany\AdminBundle\Controller\AdminBundleController@pagination"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/priority\/create","name":"create_priority","action":"PrintCompany\AdminBundle\Controller\PriorityController@create"},{"host":null,"methods":["POST"],"uri":"admin\/priority\/create","name":"save_priority","action":"PrintCompany\AdminBundle\Controller\PriorityController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/priority\/{id}\/edit","name":"edit_priority","action":"PrintCompany\AdminBundle\Controller\PriorityController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/priority\/{id}","name":"update_priority","action":"PrintCompany\AdminBundle\Controller\PriorityController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/priority\/{id}\/delete","name":"delete_priority","action":"PrintCompany\AdminBundle\Controller\PriorityController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news-group\/create","name":"create_news_group","action":"PrintCompany\AdminBundle\Controller\NewsGroupController@create"},{"host":null,"methods":["POST"],"uri":"admin\/news-group\/create","name":"save_news_group","action":"PrintCompany\AdminBundle\Controller\NewsGroupController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news-group\/{id}\/edit","name":"edit_news_group","action":"PrintCompany\AdminBundle\Controller\NewsGroupController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/news-group\/{id}","name":"update_news_group","action":"PrintCompany\AdminBundle\Controller\NewsGroupController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/news-group\/{id}\/delete","name":"delete_news_group","action":"PrintCompany\AdminBundle\Controller\NewsGroupController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/department\/create","name":"create_department","action":"PrintCompany\AdminBundle\Controller\DepartmentController@create"},{"host":null,"methods":["POST"],"uri":"admin\/department\/create","name":"save_department","action":"PrintCompany\AdminBundle\Controller\DepartmentController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/department\/{id}\/edit","name":"edit_department","action":"PrintCompany\AdminBundle\Controller\DepartmentController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/department\/{id}","name":"update_department","action":"PrintCompany\AdminBundle\Controller\DepartmentController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/department\/{id}\/delete","name":"delete_department","action":"PrintCompany\AdminBundle\Controller\DepartmentController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news\/create","name":"create_news","action":"PrintCompany\AdminBundle\Controller\NewsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/news\/create","name":"save_news","action":"PrintCompany\AdminBundle\Controller\NewsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news","name":"show_news","action":"PrintCompany\AdminBundle\Controller\NewsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news\/{news}\/edit","name":"edit_news","action":"PrintCompany\AdminBundle\Controller\NewsController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/news\/{news}","name":"update_news","action":"PrintCompany\AdminBundle\Controller\NewsController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/create","name":"create_category","action":"PrintCompany\AdminBundle\Controller\ProductCategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/category\/create","name":"save_category","action":"PrintCompany\AdminBundle\Controller\ProductCategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/{id}\/edit","name":"edit_category","action":"PrintCompany\AdminBundle\Controller\ProductCategoryController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/category\/{id}","name":"update_category","action":"PrintCompany\AdminBundle\Controller\ProductCategoryController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/category\/{id}\/delete","name":"delete_category","action":"PrintCompany\AdminBundle\Controller\ProductCategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/status\/create","name":"create_product_status","action":"PrintCompany\AdminBundle\Controller\ProductStatusController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/status\/create","name":"save_product_status","action":"PrintCompany\AdminBundle\Controller\ProductStatusController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/status\/{id}\/edit","name":"edit_product_status","action":"PrintCompany\AdminBundle\Controller\ProductStatusController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/status\/{id}","name":"update_product_status","action":"PrintCompany\AdminBundle\Controller\ProductStatusController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/status\/{id}\/delete","name":"delete_product_status","action":"PrintCompany\AdminBundle\Controller\ProductStatusController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/author\/create","name":"create_product_author","action":"PrintCompany\AdminBundle\Controller\ProductAuthorController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/author\/create","name":"save_product_author","action":"PrintCompany\AdminBundle\Controller\ProductAuthorController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/author\/{id}\/edit","name":"edit_product_author","action":"PrintCompany\AdminBundle\Controller\ProductAuthorController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/author\/{id}","name":"update_product_author","action":"PrintCompany\AdminBundle\Controller\ProductAuthorController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/author\/{id}\/delete","name":"delete_product_author","action":"PrintCompany\AdminBundle\Controller\ProductAuthorController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/translator\/create","name":"create_product_translator","action":"PrintCompany\AdminBundle\Controller\ProductTranslatorController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/translator\/create","name":"save_product_translator","action":"PrintCompany\AdminBundle\Controller\ProductTranslatorController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/translator\/{id}\/edit","name":"edit_product_translator","action":"PrintCompany\AdminBundle\Controller\ProductTranslatorController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/translator\/{id}","name":"update_product_translator","action":"PrintCompany\AdminBundle\Controller\ProductTranslatorController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/translator\/{id}\/delete","name":"delete_product_translator","action":"PrintCompany\AdminBundle\Controller\ProductTranslatorController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/sizes\/create","name":"create_product_size","action":"PrintCompany\AdminBundle\Controller\ProductSizeController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/sizes\/create","name":"save_product_size","action":"PrintCompany\AdminBundle\Controller\ProductSizeController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/sizes\/{id}\/edit","name":"edit_product_size","action":"PrintCompany\AdminBundle\Controller\ProductSizeController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/sizes\/{id}","name":"update_product_size","action":"PrintCompany\AdminBundle\Controller\ProductSizeController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/sizes\/{id}\/delete","name":"delete_product_size","action":"PrintCompany\AdminBundle\Controller\ProductSizeController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/volume\/create","name":"create_product_volume_type","action":"PrintCompany\AdminBundle\Controller\ProductVolumeTypeController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/volume\/create","name":"save_product_volume_type","action":"PrintCompany\AdminBundle\Controller\ProductVolumeTypeController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/volume\/{id}\/edit","name":"edit_product_volume_type","action":"PrintCompany\AdminBundle\Controller\ProductVolumeTypeController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/volume\/{id}","name":"update_product_volume_type","action":"PrintCompany\AdminBundle\Controller\ProductVolumeTypeController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/volume\/{id}\/delete","name":"delete_product_volume_type","action":"PrintCompany\AdminBundle\Controller\ProductVolumeTypeController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/publisher\/create","name":"create_product_publisher","action":"PrintCompany\AdminBundle\Controller\ProductPublisherController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/publisher\/create","name":"save_product_publisher","action":"PrintCompany\AdminBundle\Controller\ProductPublisherController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/publisher\/{id}\/edit","name":"edit_product_publisher","action":"PrintCompany\AdminBundle\Controller\ProductPublisherController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/publisher\/{id}","name":"update_product_publisher","action":"PrintCompany\AdminBundle\Controller\ProductPublisherController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/publisher\/{id}\/delete","name":"delete_product_publisher","action":"PrintCompany\AdminBundle\Controller\ProductPublisherController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/language\/create","name":"create_product_language","action":"PrintCompany\AdminBundle\Controller\ProductLanguageController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/language\/create","name":"save_product_language","action":"PrintCompany\AdminBundle\Controller\ProductLanguageController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/language\/{id}\/edit","name":"edit_product_language","action":"PrintCompany\AdminBundle\Controller\ProductLanguageController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/language\/{id}","name":"update_product_language","action":"PrintCompany\AdminBundle\Controller\ProductLanguageController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/language\/{id}\/delete","name":"delete_product_language","action":"PrintCompany\AdminBundle\Controller\ProductLanguageController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/measure\/create","name":"create_product_measure","action":"PrintCompany\AdminBundle\Controller\ProductMeasurementUnitController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/measure\/create","name":"save_product_measure","action":"PrintCompany\AdminBundle\Controller\ProductMeasurementUnitController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/measure\/{id}\/edit","name":"edit_product_measure","action":"PrintCompany\AdminBundle\Controller\ProductMeasurementUnitController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/measure\/{id}","name":"update_product_measure","action":"PrintCompany\AdminBundle\Controller\ProductMeasurementUnitController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/measure\/{id}\/delete","name":"delete_product_measure","action":"PrintCompany\AdminBundle\Controller\ProductMeasurementUnitController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/weight\/create","name":"create_product_weight","action":"PrintCompany\AdminBundle\Controller\ProductWeightUnitController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/weight\/create","name":"save_product_weight","action":"PrintCompany\AdminBundle\Controller\ProductWeightUnitController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/weight\/{id}\/edit","name":"edit_product_weight","action":"PrintCompany\AdminBundle\Controller\ProductWeightUnitController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/weight\/{id}","name":"update_product_weight","action":"PrintCompany\AdminBundle\Controller\ProductWeightUnitController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/weight\/{id}\/delete","name":"delete_product_weight","action":"PrintCompany\AdminBundle\Controller\ProductWeightUnitController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/cost-unit\/create","name":"create_product_costUnit","action":"PrintCompany\AdminBundle\Controller\ProductCostUnitController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/cost-unit\/create","name":"save_product_costUnit","action":"PrintCompany\AdminBundle\Controller\ProductCostUnitController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/cost-unit\/{id}\/edit","name":"edit_product_costUnit","action":"PrintCompany\AdminBundle\Controller\ProductCostUnitController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/cost-unit\/{id}","name":"update_product_costUnit","action":"PrintCompany\AdminBundle\Controller\ProductCostUnitController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/cost-unit\/{id}\/delete","name":"delete_product_costUnit","action":"PrintCompany\AdminBundle\Controller\ProductCostUnitController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/create","name":"create_product","action":"PrintCompany\AdminBundle\Controller\ProductController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product\/create","name":"save_product","action":"PrintCompany\AdminBundle\Controller\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/{id}\/edit","name":"edit_product","action":"PrintCompany\AdminBundle\Controller\ProductController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/product\/{id}","name":"update_product","action":"PrintCompany\AdminBundle\Controller\ProductController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product","name":"show_product","action":"PrintCompany\AdminBundle\Controller\ProductController@index"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/{id}\/delete","name":"delete_product","action":"PrintCompany\AdminBundle\Controller\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/address\/create","name":"create_contact_us_address","action":"PrintCompany\AdminBundle\Controller\ContactUsAddressController@create"},{"host":null,"methods":["POST"],"uri":"admin\/contact-us\/address\/create","name":"save_contact_us_address","action":"PrintCompany\AdminBundle\Controller\ContactUsAddressController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/address\/{id}\/edit","name":"edit_contact_us_address","action":"PrintCompany\AdminBundle\Controller\ContactUsAddressController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/contact-us\/address\/{id}","name":"update_contact_us_address","action":"PrintCompany\AdminBundle\Controller\ContactUsAddressController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/contact-us\/address\/{id}\/delete","name":"delete_contact_us_address","action":"PrintCompany\AdminBundle\Controller\ContactUsAddressController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/tell-email\/create","name":"create_contact_us_tell_email","action":"PrintCompany\AdminBundle\Controller\ContactUsTellAndEmailController@create"},{"host":null,"methods":["POST"],"uri":"admin\/contact-us\/tell-email\/create","name":"save_contact_us_tell_email","action":"PrintCompany\AdminBundle\Controller\ContactUsTellAndEmailController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/tell-email\/{id}\/edit","name":"edit_contact_us_tell_email","action":"PrintCompany\AdminBundle\Controller\ContactUsTellAndEmailController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/contact-us\/tell-email\/{id}","name":"update_contact_us_tell_email","action":"PrintCompany\AdminBundle\Controller\ContactUsTellAndEmailController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/contact-us\/tell-email\/{id}\/delete","name":"delete_contact_us_tell_email","action":"PrintCompany\AdminBundle\Controller\ContactUsTellAndEmailController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/create","name":"create_contact_us","action":"PrintCompany\AdminBundle\Controller\ContactUsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/contact-us\/create","name":"save_contact_us","action":"PrintCompany\AdminBundle\Controller\ContactUsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact-us\/{id}\/edit","name":"edit_contact_us","action":"PrintCompany\AdminBundle\Controller\ContactUsController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/contact-us\/{id}","name":"update_contact_us","action":"PrintCompany\AdminBundle\Controller\ContactUsController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu\/create","name":"create_menu","action":"PrintCompany\AdminBundle\Controller\MenuController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menu\/create","name":"save_menu","action":"PrintCompany\AdminBundle\Controller\MenuController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu\/{id}\/edit","name":"edit_menu","action":"PrintCompany\AdminBundle\Controller\MenuController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/menu\/{id}","name":"update_menu","action":"PrintCompany\AdminBundle\Controller\MenuController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/menu\/{id}\/delete","name":"delete_menu","action":"PrintCompany\AdminBundle\Controller\MenuController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/our-customer\/create","name":"create_customer","action":"PrintCompany\AdminBundle\Controller\OurCustomerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/our-customer\/create","name":"save_customer","action":"PrintCompany\AdminBundle\Controller\OurCustomerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/our-customer\/{id}\/edit","name":"edit_customer","action":"PrintCompany\AdminBundle\Controller\OurCustomerController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/our-customer\/{id}","name":"update_customer","action":"PrintCompany\AdminBundle\Controller\OurCustomerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/our-customer\/{id}\/delete","name":"delete_customer","action":"PrintCompany\AdminBundle\Controller\OurCustomerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu-text\/create\/{id?}","name":"create_menu_text","action":"PrintCompany\AdminBundle\Controller\MenuTextController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menu-text\/create","name":"save_menu_text","action":"PrintCompany\AdminBundle\Controller\MenuTextController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu-text\/{id}\/edit","name":"edit_menu_text","action":"PrintCompany\AdminBundle\Controller\MenuTextController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/menu-text\/{id}","name":"update_menu_text","action":"PrintCompany\AdminBundle\Controller\MenuTextController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu-text","name":"show_menu_text","action":"PrintCompany\AdminBundle\Controller\MenuTextController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"captcha\/image","name":"bone.captcha.image","action":"Igoshev\Captcha\Controllers\CaptchaController@image"},{"host":null,"methods":["GET","HEAD"],"uri":"captcha\/image_tag","name":"bone.captcha.image.tag","action":"Igoshev\Captcha\Controllers\CaptchaController@imageTag"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

