<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // lc_lc_homepage
        if (0 === strpos($pathinfo, '/lc') && preg_match('#^/lc/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'lc_lc_homepage')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // admin
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin',);
            }

            // admin_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::showAction',));
            }

            // admin_new
            if ($pathinfo === '/admin/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::newAction',  '_route' => 'admin_new',);
            }

            // admin_create
            if ($pathinfo === '/admin/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::createAction',  '_route' => 'admin_create',);
            }
            not_admin_create:

            // admin_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::editAction',));
            }

            // admin_update
            if (preg_match('#^/admin/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_admin_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::updateAction',));
            }
            not_admin_update:

            // admin_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_admin_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::deleteAction',));
            }
            not_admin_delete:

            if (0 === strpos($pathinfo, '/admindoing')) {
                // admindoing
                if (rtrim($pathinfo, '/') === '/admindoing') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admindoing');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::indexAction',  '_route' => 'admindoing',);
                }

                // admindoing_show
                if (preg_match('#^/admindoing/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::showAction',));
                }

                // admindoing_new
                if ($pathinfo === '/admindoing/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::newAction',  '_route' => 'admindoing_new',);
                }

                // admindoing_create
                if ($pathinfo === '/admindoing/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admindoing_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::createAction',  '_route' => 'admindoing_create',);
                }
                not_admindoing_create:

                // admindoing_edit
                if (preg_match('#^/admindoing/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::editAction',));
                }

                // admindoing_update
                if (preg_match('#^/admindoing/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admindoing_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::updateAction',));
                }
                not_admindoing_update:

                // admindoing_delete
                if (preg_match('#^/admindoing/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admindoing_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::deleteAction',));
                }
                not_admindoing_delete:

            }

            if (0 === strpos($pathinfo, '/adminlog')) {
                // adminlog
                if (rtrim($pathinfo, '/') === '/adminlog') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'adminlog');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::indexAction',  '_route' => 'adminlog',);
                }

                // adminlog_show
                if (preg_match('#^/adminlog/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::showAction',));
                }

                // adminlog_new
                if ($pathinfo === '/adminlog/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::newAction',  '_route' => 'adminlog_new',);
                }

                // adminlog_create
                if ($pathinfo === '/adminlog/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_adminlog_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::createAction',  '_route' => 'adminlog_create',);
                }
                not_adminlog_create:

                // adminlog_edit
                if (preg_match('#^/adminlog/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::editAction',));
                }

                // adminlog_update
                if (preg_match('#^/adminlog/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_adminlog_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::updateAction',));
                }
                not_adminlog_update:

                // adminlog_delete
                if (preg_match('#^/adminlog/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_adminlog_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::deleteAction',));
                }
                not_adminlog_delete:

            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/chat')) {
                // chat
                if (rtrim($pathinfo, '/') === '/chat') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'chat');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::indexAction',  '_route' => 'chat',);
                }

                // chat_show
                if (preg_match('#^/chat/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::showAction',));
                }

                // chat_new
                if ($pathinfo === '/chat/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::newAction',  '_route' => 'chat_new',);
                }

                // chat_create
                if ($pathinfo === '/chat/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_chat_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::createAction',  '_route' => 'chat_create',);
                }
                not_chat_create:

                // chat_edit
                if (preg_match('#^/chat/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::editAction',));
                }

                // chat_update
                if (preg_match('#^/chat/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_chat_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::updateAction',));
                }
                not_chat_update:

                // chat_delete
                if (preg_match('#^/chat/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_chat_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::deleteAction',));
                }
                not_chat_delete:

            }

            if (0 === strpos($pathinfo, '/city')) {
                // city
                if (rtrim($pathinfo, '/') === '/city') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'city');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::indexAction',  '_route' => 'city',);
                }

                // city_show
                if (preg_match('#^/city/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::showAction',));
                }

                // city_new
                if ($pathinfo === '/city/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::newAction',  '_route' => 'city_new',);
                }

                // city_create
                if ($pathinfo === '/city/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_city_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::createAction',  '_route' => 'city_create',);
                }
                not_city_create:

                // city_edit
                if (preg_match('#^/city/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::editAction',));
                }

                // city_update
                if (preg_match('#^/city/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_city_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::updateAction',));
                }
                not_city_update:

                // city_delete
                if (preg_match('#^/city/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_city_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::deleteAction',));
                }
                not_city_delete:

            }

            if (0 === strpos($pathinfo, '/controllerlist')) {
                // controllerlist
                if (rtrim($pathinfo, '/') === '/controllerlist') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'controllerlist');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::indexAction',  '_route' => 'controllerlist',);
                }

                // controllerlist_show
                if (preg_match('#^/controllerlist/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::showAction',));
                }

                // controllerlist_new
                if ($pathinfo === '/controllerlist/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::newAction',  '_route' => 'controllerlist_new',);
                }

                // controllerlist_create
                if ($pathinfo === '/controllerlist/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_controllerlist_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::createAction',  '_route' => 'controllerlist_create',);
                }
                not_controllerlist_create:

                // controllerlist_edit
                if (preg_match('#^/controllerlist/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::editAction',));
                }

                // controllerlist_update
                if (preg_match('#^/controllerlist/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_controllerlist_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::updateAction',));
                }
                not_controllerlist_update:

                // controllerlist_delete
                if (preg_match('#^/controllerlist/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_controllerlist_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::deleteAction',));
                }
                not_controllerlist_delete:

            }

            if (0 === strpos($pathinfo, '/criteria')) {
                // criteria
                if (rtrim($pathinfo, '/') === '/criteria') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'criteria');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::indexAction',  '_route' => 'criteria',);
                }

                // criteria_show
                if (preg_match('#^/criteria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::showAction',));
                }

                // criteria_new
                if ($pathinfo === '/criteria/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::newAction',  '_route' => 'criteria_new',);
                }

                // criteria_create
                if ($pathinfo === '/criteria/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_criteria_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::createAction',  '_route' => 'criteria_create',);
                }
                not_criteria_create:

                // criteria_edit
                if (preg_match('#^/criteria/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::editAction',));
                }

                // criteria_update
                if (preg_match('#^/criteria/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_criteria_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::updateAction',));
                }
                not_criteria_update:

                // criteria_delete
                if (preg_match('#^/criteria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_criteria_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::deleteAction',));
                }
                not_criteria_delete:

            }

        }

        if (0 === strpos($pathinfo, '/education')) {
            // education
            if (rtrim($pathinfo, '/') === '/education') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'education');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::indexAction',  '_route' => 'education',);
            }

            // education_show
            if (preg_match('#^/education/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::showAction',));
            }

            // education_new
            if ($pathinfo === '/education/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::newAction',  '_route' => 'education_new',);
            }

            // education_create
            if ($pathinfo === '/education/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_education_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::createAction',  '_route' => 'education_create',);
            }
            not_education_create:

            // education_edit
            if (preg_match('#^/education/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::editAction',));
            }

            // education_update
            if (preg_match('#^/education/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_education_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::updateAction',));
            }
            not_education_update:

            // education_delete
            if (preg_match('#^/education/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_education_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::deleteAction',));
            }
            not_education_delete:

        }

        if (0 === strpos($pathinfo, '/f')) {
            if (0 === strpos($pathinfo, '/fcomment')) {
                // fcomment
                if (rtrim($pathinfo, '/') === '/fcomment') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fcomment');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::indexAction',  '_route' => 'fcomment',);
                }

                // fcomment_show
                if (preg_match('#^/fcomment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::showAction',));
                }

                // fcomment_new
                if ($pathinfo === '/fcomment/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::newAction',  '_route' => 'fcomment_new',);
                }

                // fcomment_create
                if ($pathinfo === '/fcomment/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fcomment_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::createAction',  '_route' => 'fcomment_create',);
                }
                not_fcomment_create:

                // fcomment_edit
                if (preg_match('#^/fcomment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::editAction',));
                }

                // fcomment_update
                if (preg_match('#^/fcomment/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_fcomment_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::updateAction',));
                }
                not_fcomment_update:

                // fcomment_delete
                if (preg_match('#^/fcomment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_fcomment_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::deleteAction',));
                }
                not_fcomment_delete:

            }

            if (0 === strpos($pathinfo, '/feeling')) {
                // feeling
                if (rtrim($pathinfo, '/') === '/feeling') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'feeling');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::indexAction',  '_route' => 'feeling',);
                }

                // feeling_show
                if (preg_match('#^/feeling/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::showAction',));
                }

                // feeling_new
                if ($pathinfo === '/feeling/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::newAction',  '_route' => 'feeling_new',);
                }

                // feeling_create
                if ($pathinfo === '/feeling/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_feeling_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::createAction',  '_route' => 'feeling_create',);
                }
                not_feeling_create:

                // feeling_edit
                if (preg_match('#^/feeling/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::editAction',));
                }

                // feeling_update
                if (preg_match('#^/feeling/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_feeling_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::updateAction',));
                }
                not_feeling_update:

                // feeling_delete
                if (preg_match('#^/feeling/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_feeling_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::deleteAction',));
                }
                not_feeling_delete:

            }

            if (0 === strpos($pathinfo, '/flike')) {
                // flike
                if (rtrim($pathinfo, '/') === '/flike') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'flike');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::indexAction',  '_route' => 'flike',);
                }

                // flike_show
                if (preg_match('#^/flike/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::showAction',));
                }

                // flike_new
                if ($pathinfo === '/flike/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::newAction',  '_route' => 'flike_new',);
                }

                // flike_create
                if ($pathinfo === '/flike/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_flike_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::createAction',  '_route' => 'flike_create',);
                }
                not_flike_create:

                // flike_edit
                if (preg_match('#^/flike/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::editAction',));
                }

                // flike_update
                if (preg_match('#^/flike/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_flike_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::updateAction',));
                }
                not_flike_update:

                // flike_delete
                if (preg_match('#^/flike/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_flike_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::deleteAction',));
                }
                not_flike_delete:

            }

            if (0 === strpos($pathinfo, '/friend')) {
                // friend
                if (rtrim($pathinfo, '/') === '/friend') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'friend');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::indexAction',  '_route' => 'friend',);
                }

                // friend_show
                if (preg_match('#^/friend/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::showAction',));
                }

                // friend_new
                if ($pathinfo === '/friend/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::newAction',  '_route' => 'friend_new',);
                }

                // friend_create
                if ($pathinfo === '/friend/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_friend_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::createAction',  '_route' => 'friend_create',);
                }
                not_friend_create:

                // friend_edit
                if (preg_match('#^/friend/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::editAction',));
                }

                // friend_update
                if (preg_match('#^/friend/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_friend_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::updateAction',));
                }
                not_friend_update:

                // friend_delete
                if (preg_match('#^/friend/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_friend_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::deleteAction',));
                }
                not_friend_delete:

            }

            if (0 === strpos($pathinfo, '/fshare')) {
                // fshare
                if (rtrim($pathinfo, '/') === '/fshare') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fshare');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::indexAction',  '_route' => 'fshare',);
                }

                // fshare_show
                if (preg_match('#^/fshare/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::showAction',));
                }

                // fshare_new
                if ($pathinfo === '/fshare/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::newAction',  '_route' => 'fshare_new',);
                }

                // fshare_create
                if ($pathinfo === '/fshare/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fshare_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::createAction',  '_route' => 'fshare_create',);
                }
                not_fshare_create:

                // fshare_edit
                if (preg_match('#^/fshare/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::editAction',));
                }

                // fshare_update
                if (preg_match('#^/fshare/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_fshare_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::updateAction',));
                }
                not_fshare_update:

                // fshare_delete
                if (preg_match('#^/fshare/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_fshare_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::deleteAction',));
                }
                not_fshare_delete:

            }

        }

        if (0 === strpos($pathinfo, '/g')) {
            if (0 === strpos($pathinfo, '/gallery')) {
                // gallery
                if (rtrim($pathinfo, '/') === '/gallery') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'gallery');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::indexAction',  '_route' => 'gallery',);
                }

                // gallery_show
                if (preg_match('#^/gallery/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::showAction',));
                }

                // gallery_new
                if ($pathinfo === '/gallery/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::newAction',  '_route' => 'gallery_new',);
                }

                // gallery_create
                if ($pathinfo === '/gallery/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_gallery_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::createAction',  '_route' => 'gallery_create',);
                }
                not_gallery_create:

                // gallery_edit
                if (preg_match('#^/gallery/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::editAction',));
                }

                // gallery_update
                if (preg_match('#^/gallery/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_gallery_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::updateAction',));
                }
                not_gallery_update:

                // gallery_delete
                if (preg_match('#^/gallery/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_gallery_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::deleteAction',));
                }
                not_gallery_delete:

            }

            if (0 === strpos($pathinfo, '/glike')) {
                // glike
                if (rtrim($pathinfo, '/') === '/glike') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'glike');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::indexAction',  '_route' => 'glike',);
                }

                // glike_show
                if (preg_match('#^/glike/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::showAction',));
                }

                // glike_new
                if ($pathinfo === '/glike/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::newAction',  '_route' => 'glike_new',);
                }

                // glike_create
                if ($pathinfo === '/glike/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_glike_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::createAction',  '_route' => 'glike_create',);
                }
                not_glike_create:

                // glike_edit
                if (preg_match('#^/glike/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::editAction',));
                }

                // glike_update
                if (preg_match('#^/glike/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_glike_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::updateAction',));
                }
                not_glike_update:

                // glike_delete
                if (preg_match('#^/glike/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_glike_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::deleteAction',));
                }
                not_glike_delete:

            }

            if (0 === strpos($pathinfo, '/gcomment')) {
                // gcomment
                if (rtrim($pathinfo, '/') === '/gcomment') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'gcomment');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::indexAction',  '_route' => 'gcomment',);
                }

                // gcomment_show
                if (preg_match('#^/gcomment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::showAction',));
                }

                // gcomment_new
                if ($pathinfo === '/gcomment/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::newAction',  '_route' => 'gcomment_new',);
                }

                // gcomment_create
                if ($pathinfo === '/gcomment/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_gcomment_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::createAction',  '_route' => 'gcomment_create',);
                }
                not_gcomment_create:

                // gcomment_edit
                if (preg_match('#^/gcomment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::editAction',));
                }

                // gcomment_update
                if (preg_match('#^/gcomment/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_gcomment_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::updateAction',));
                }
                not_gcomment_update:

                // gcomment_delete
                if (preg_match('#^/gcomment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_gcomment_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::deleteAction',));
                }
                not_gcomment_delete:

            }

            if (0 === strpos($pathinfo, '/gshare')) {
                // gshare
                if (rtrim($pathinfo, '/') === '/gshare') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'gshare');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::indexAction',  '_route' => 'gshare',);
                }

                // gshare_show
                if (preg_match('#^/gshare/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::showAction',));
                }

                // gshare_new
                if ($pathinfo === '/gshare/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::newAction',  '_route' => 'gshare_new',);
                }

                // gshare_create
                if ($pathinfo === '/gshare/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_gshare_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::createAction',  '_route' => 'gshare_create',);
                }
                not_gshare_create:

                // gshare_edit
                if (preg_match('#^/gshare/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::editAction',));
                }

                // gshare_update
                if (preg_match('#^/gshare/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_gshare_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::updateAction',));
                }
                not_gshare_update:

                // gshare_delete
                if (preg_match('#^/gshare/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_gshare_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::deleteAction',));
                }
                not_gshare_delete:

            }

        }

        if (0 === strpos($pathinfo, '/hobby')) {
            // hobby
            if (rtrim($pathinfo, '/') === '/hobby') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hobby');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::indexAction',  '_route' => 'hobby',);
            }

            // hobby_show
            if (preg_match('#^/hobby/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::showAction',));
            }

            // hobby_new
            if ($pathinfo === '/hobby/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::newAction',  '_route' => 'hobby_new',);
            }

            // hobby_create
            if ($pathinfo === '/hobby/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_hobby_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::createAction',  '_route' => 'hobby_create',);
            }
            not_hobby_create:

            // hobby_edit
            if (preg_match('#^/hobby/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::editAction',));
            }

            // hobby_update
            if (preg_match('#^/hobby/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_hobby_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::updateAction',));
            }
            not_hobby_update:

            // hobby_delete
            if (preg_match('#^/hobby/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_hobby_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::deleteAction',));
            }
            not_hobby_delete:

        }

        if (0 === strpos($pathinfo, '/job')) {
            // job
            if (rtrim($pathinfo, '/') === '/job') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'job');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::indexAction',  '_route' => 'job',);
            }

            // job_show
            if (preg_match('#^/job/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::showAction',));
            }

            // job_new
            if ($pathinfo === '/job/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::newAction',  '_route' => 'job_new',);
            }

            // job_create
            if ($pathinfo === '/job/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_job_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::createAction',  '_route' => 'job_create',);
            }
            not_job_create:

            // job_edit
            if (preg_match('#^/job/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::editAction',));
            }

            // job_update
            if (preg_match('#^/job/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_job_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::updateAction',));
            }
            not_job_update:

            // job_delete
            if (preg_match('#^/job/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_job_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::deleteAction',));
            }
            not_job_delete:

        }

        if (0 === strpos($pathinfo, '/methodlist')) {
            // methodlist
            if (rtrim($pathinfo, '/') === '/methodlist') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'methodlist');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::indexAction',  '_route' => 'methodlist',);
            }

            // methodlist_show
            if (preg_match('#^/methodlist/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::showAction',));
            }

            // methodlist_new
            if ($pathinfo === '/methodlist/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::newAction',  '_route' => 'methodlist_new',);
            }

            // methodlist_create
            if ($pathinfo === '/methodlist/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_methodlist_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::createAction',  '_route' => 'methodlist_create',);
            }
            not_methodlist_create:

            // methodlist_edit
            if (preg_match('#^/methodlist/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::editAction',));
            }

            // methodlist_update
            if (preg_match('#^/methodlist/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_methodlist_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::updateAction',));
            }
            not_methodlist_update:

            // methodlist_delete
            if (preg_match('#^/methodlist/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_methodlist_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::deleteAction',));
            }
            not_methodlist_delete:

        }

        if (0 === strpos($pathinfo, '/notification')) {
            // notification
            if (rtrim($pathinfo, '/') === '/notification') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'notification');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::indexAction',  '_route' => 'notification',);
            }

            // notification_show
            if (preg_match('#^/notification/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::showAction',));
            }

            // notification_new
            if ($pathinfo === '/notification/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::newAction',  '_route' => 'notification_new',);
            }

            // notification_create
            if ($pathinfo === '/notification/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_notification_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::createAction',  '_route' => 'notification_create',);
            }
            not_notification_create:

            // notification_edit
            if (preg_match('#^/notification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::editAction',));
            }

            // notification_update
            if (preg_match('#^/notification/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_notification_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::updateAction',));
            }
            not_notification_update:

            // notification_delete
            if (preg_match('#^/notification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_notification_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::deleteAction',));
            }
            not_notification_delete:

        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/plan')) {
                // plan
                if (rtrim($pathinfo, '/') === '/plan') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'plan');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::indexAction',  '_route' => 'plan',);
                }

                // plan_show
                if (preg_match('#^/plan/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::showAction',));
                }

                // plan_new
                if ($pathinfo === '/plan/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::newAction',  '_route' => 'plan_new',);
                }

                // plan_create
                if ($pathinfo === '/plan/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_plan_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::createAction',  '_route' => 'plan_create',);
                }
                not_plan_create:

                // plan_edit
                if (preg_match('#^/plan/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::editAction',));
                }

                // plan_update
                if (preg_match('#^/plan/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_plan_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::updateAction',));
                }
                not_plan_update:

                // plan_delete
                if (preg_match('#^/plan/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_plan_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::deleteAction',));
                }
                not_plan_delete:

            }

            if (0 === strpos($pathinfo, '/pro')) {
                if (0 === strpos($pathinfo, '/profile')) {
                    // profile
                    if (rtrim($pathinfo, '/') === '/profile') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'profile');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::indexAction',  '_route' => 'profile',);
                    }

                    // profile_show
                    if (preg_match('#^/profile/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::showAction',));
                    }

                    // profile_new
                    if ($pathinfo === '/profile/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::newAction',  '_route' => 'profile_new',);
                    }

                    // profile_create
                    if ($pathinfo === '/profile/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_profile_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::createAction',  '_route' => 'profile_create',);
                    }
                    not_profile_create:

                    // profile_edit
                    if (preg_match('#^/profile/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::editAction',));
                    }

                    // profile_update
                    if (preg_match('#^/profile/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_profile_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::updateAction',));
                    }
                    not_profile_update:

                    // profile_delete
                    if (preg_match('#^/profile/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_profile_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::deleteAction',));
                    }
                    not_profile_delete:

                }

                if (0 === strpos($pathinfo, '/province')) {
                    // province
                    if (rtrim($pathinfo, '/') === '/province') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'province');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::indexAction',  '_route' => 'province',);
                    }

                    // province_show
                    if (preg_match('#^/province/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::showAction',));
                    }

                    // province_new
                    if ($pathinfo === '/province/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::newAction',  '_route' => 'province_new',);
                    }

                    // province_create
                    if ($pathinfo === '/province/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_province_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::createAction',  '_route' => 'province_create',);
                    }
                    not_province_create:

                    // province_edit
                    if (preg_match('#^/province/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::editAction',));
                    }

                    // province_update
                    if (preg_match('#^/province/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_province_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::updateAction',));
                    }
                    not_province_update:

                    // province_delete
                    if (preg_match('#^/province/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_province_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::deleteAction',));
                    }
                    not_province_delete:

                }

            }

        }

        if (0 === strpos($pathinfo, '/religy')) {
            // religy
            if (rtrim($pathinfo, '/') === '/religy') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'religy');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::indexAction',  '_route' => 'religy',);
            }

            // religy_show
            if (preg_match('#^/religy/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::showAction',));
            }

            // religy_new
            if ($pathinfo === '/religy/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::newAction',  '_route' => 'religy_new',);
            }

            // religy_create
            if ($pathinfo === '/religy/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_religy_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::createAction',  '_route' => 'religy_create',);
            }
            not_religy_create:

            // religy_edit
            if (preg_match('#^/religy/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::editAction',));
            }

            // religy_update
            if (preg_match('#^/religy/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_religy_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::updateAction',));
            }
            not_religy_update:

            // religy_delete
            if (preg_match('#^/religy/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_religy_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::deleteAction',));
            }
            not_religy_delete:

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/sallary')) {
                // sallary
                if (rtrim($pathinfo, '/') === '/sallary') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sallary');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::indexAction',  '_route' => 'sallary',);
                }

                // sallary_show
                if (preg_match('#^/sallary/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::showAction',));
                }

                // sallary_new
                if ($pathinfo === '/sallary/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::newAction',  '_route' => 'sallary_new',);
                }

                // sallary_create
                if ($pathinfo === '/sallary/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sallary_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::createAction',  '_route' => 'sallary_create',);
                }
                not_sallary_create:

                // sallary_edit
                if (preg_match('#^/sallary/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::editAction',));
                }

                // sallary_update
                if (preg_match('#^/sallary/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_sallary_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::updateAction',));
                }
                not_sallary_update:

                // sallary_delete
                if (preg_match('#^/sallary/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_sallary_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::deleteAction',));
                }
                not_sallary_delete:

            }

            if (0 === strpos($pathinfo, '/sex')) {
                // sex
                if (rtrim($pathinfo, '/') === '/sex') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sex');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::indexAction',  '_route' => 'sex',);
                }

                // sex_show
                if (preg_match('#^/sex/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::showAction',));
                }

                // sex_new
                if ($pathinfo === '/sex/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::newAction',  '_route' => 'sex_new',);
                }

                // sex_create
                if ($pathinfo === '/sex/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sex_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::createAction',  '_route' => 'sex_create',);
                }
                not_sex_create:

                // sex_edit
                if (preg_match('#^/sex/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::editAction',));
                }

                // sex_update
                if (preg_match('#^/sex/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_sex_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::updateAction',));
                }
                not_sex_update:

                // sex_delete
                if (preg_match('#^/sex/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_sex_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::deleteAction',));
                }
                not_sex_delete:

            }

            if (0 === strpos($pathinfo, '/status')) {
                // status
                if (rtrim($pathinfo, '/') === '/status') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'status');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::indexAction',  '_route' => 'status',);
                }

                // status_show
                if (preg_match('#^/status/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::showAction',));
                }

                // status_new
                if ($pathinfo === '/status/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::newAction',  '_route' => 'status_new',);
                }

                // status_create
                if ($pathinfo === '/status/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_status_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::createAction',  '_route' => 'status_create',);
                }
                not_status_create:

                // status_edit
                if (preg_match('#^/status/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::editAction',));
                }

                // status_update
                if (preg_match('#^/status/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_status_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::updateAction',));
                }
                not_status_update:

                // status_delete
                if (preg_match('#^/status/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_status_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::deleteAction',));
                }
                not_status_delete:

            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::showAction',));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::editAction',));
            }

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

            if (0 === strpos($pathinfo, '/usercriteria')) {
                // usercriteria
                if (rtrim($pathinfo, '/') === '/usercriteria') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usercriteria');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::indexAction',  '_route' => 'usercriteria',);
                }

                // usercriteria_show
                if (preg_match('#^/usercriteria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::showAction',));
                }

                // usercriteria_new
                if ($pathinfo === '/usercriteria/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::newAction',  '_route' => 'usercriteria_new',);
                }

                // usercriteria_create
                if ($pathinfo === '/usercriteria/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_usercriteria_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::createAction',  '_route' => 'usercriteria_create',);
                }
                not_usercriteria_create:

                // usercriteria_edit
                if (preg_match('#^/usercriteria/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::editAction',));
                }

                // usercriteria_update
                if (preg_match('#^/usercriteria/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_usercriteria_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::updateAction',));
                }
                not_usercriteria_update:

                // usercriteria_delete
                if (preg_match('#^/usercriteria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_usercriteria_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::deleteAction',));
                }
                not_usercriteria_delete:

            }

            if (0 === strpos($pathinfo, '/userdoing')) {
                // userdoing
                if (rtrim($pathinfo, '/') === '/userdoing') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'userdoing');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::indexAction',  '_route' => 'userdoing',);
                }

                // userdoing_show
                if (preg_match('#^/userdoing/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::showAction',));
                }

                // userdoing_new
                if ($pathinfo === '/userdoing/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::newAction',  '_route' => 'userdoing_new',);
                }

                // userdoing_create
                if ($pathinfo === '/userdoing/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_userdoing_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::createAction',  '_route' => 'userdoing_create',);
                }
                not_userdoing_create:

                // userdoing_edit
                if (preg_match('#^/userdoing/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::editAction',));
                }

                // userdoing_update
                if (preg_match('#^/userdoing/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_userdoing_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::updateAction',));
                }
                not_userdoing_update:

                // userdoing_delete
                if (preg_match('#^/userdoing/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_userdoing_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::deleteAction',));
                }
                not_userdoing_delete:

            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
