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
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'lc_lc_homepage');
            }

            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::indexAction',  '_route' => 'lc_lc_homepage',);
        }

        if (0 === strpos($pathinfo, '/heaven')) {
            if (0 === strpos($pathinfo, '/heaven/admin')) {
                // admin
                if (rtrim($pathinfo, '/') === '/heaven/admin') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin',);
                }

                // admin_show
                if (preg_match('#^/heaven/admin/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::showAction',));
                }

                // admin_new
                if ($pathinfo === '/heaven/admin/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::newAction',  '_route' => 'admin_new',);
                }

                // admin_create
                if ($pathinfo === '/heaven/admin/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::createAction',  '_route' => 'admin_create',);
                }
                not_admin_create:

                // admin_edit
                if (preg_match('#^/heaven/admin/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::editAction',));
                }

                // admin_update
                if (preg_match('#^/heaven/admin/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::updateAction',));
                }
                not_admin_update:

                // admin_delete
                if (preg_match('#^/heaven/admin/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminController::deleteAction',));
                }
                not_admin_delete:

                if (0 === strpos($pathinfo, '/heaven/admindoing')) {
                    // admindoing
                    if (rtrim($pathinfo, '/') === '/heaven/admindoing') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admindoing');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::indexAction',  '_route' => 'admindoing',);
                    }

                    // admindoing_show
                    if (preg_match('#^/heaven/admindoing/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::showAction',));
                    }

                    // admindoing_new
                    if ($pathinfo === '/heaven/admindoing/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::newAction',  '_route' => 'admindoing_new',);
                    }

                    // admindoing_create
                    if ($pathinfo === '/heaven/admindoing/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admindoing_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::createAction',  '_route' => 'admindoing_create',);
                    }
                    not_admindoing_create:

                    // admindoing_edit
                    if (preg_match('#^/heaven/admindoing/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::editAction',));
                    }

                    // admindoing_update
                    if (preg_match('#^/heaven/admindoing/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admindoing_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::updateAction',));
                    }
                    not_admindoing_update:

                    // admindoing_delete
                    if (preg_match('#^/heaven/admindoing/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_admindoing_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admindoing_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdmindoingController::deleteAction',));
                    }
                    not_admindoing_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/adminlog')) {
                    // adminlog
                    if (rtrim($pathinfo, '/') === '/heaven/adminlog') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'adminlog');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::indexAction',  '_route' => 'adminlog',);
                    }

                    // adminlog_show
                    if (preg_match('#^/heaven/adminlog/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::showAction',));
                    }

                    // adminlog_new
                    if ($pathinfo === '/heaven/adminlog/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::newAction',  '_route' => 'adminlog_new',);
                    }

                    // adminlog_create
                    if ($pathinfo === '/heaven/adminlog/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_adminlog_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::createAction',  '_route' => 'adminlog_create',);
                    }
                    not_adminlog_create:

                    // adminlog_edit
                    if (preg_match('#^/heaven/adminlog/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::editAction',));
                    }

                    // adminlog_update
                    if (preg_match('#^/heaven/adminlog/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_adminlog_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::updateAction',));
                    }
                    not_adminlog_update:

                    // adminlog_delete
                    if (preg_match('#^/heaven/adminlog/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_adminlog_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlog_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\AdminlogController::deleteAction',));
                    }
                    not_adminlog_delete:

                }

            }

            if (0 === strpos($pathinfo, '/heaven/c')) {
                if (0 === strpos($pathinfo, '/heaven/chat')) {
                    // chat
                    if (rtrim($pathinfo, '/') === '/heaven/chat') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'chat');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::indexAction',  '_route' => 'chat',);
                    }

                    // unread_chat
                    if ($pathinfo === '/heaven/chat/unread') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::unreadAction',  '_route' => 'unread_chat',);
                    }

                    // chat_show
                    if (0 === strpos($pathinfo, '/heaven/chat/chat') && preg_match('#^/heaven/chat/chat/(?P<token>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'chat_show');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::showAction',));
                    }

                    // chat_new
                    if ($pathinfo === '/heaven/chat/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::newAction',  '_route' => 'chat_new',);
                    }

                    // chat_create
                    if ($pathinfo === '/heaven/chat/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_chat_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::createAction',  '_route' => 'chat_create',);
                    }
                    not_chat_create:

                    // chat_edit
                    if (preg_match('#^/heaven/chat/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::editAction',));
                    }

                    // chat_update
                    if (preg_match('#^/heaven/chat/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_chat_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::updateAction',));
                    }
                    not_chat_update:

                    // chat_delete
                    if (0 === strpos($pathinfo, '/heaven/chat/delete') && preg_match('#^/heaven/chat/delete/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ChatController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/heaven/city')) {
                    // city
                    if (rtrim($pathinfo, '/') === '/heaven/city') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'city');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::indexAction',  '_route' => 'city',);
                    }

                    // city_show
                    if (preg_match('#^/heaven/city/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::showAction',));
                    }

                    // city_new
                    if ($pathinfo === '/heaven/city/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::newAction',  '_route' => 'city_new',);
                    }

                    // city_create
                    if ($pathinfo === '/heaven/city/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_city_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::createAction',  '_route' => 'city_create',);
                    }
                    not_city_create:

                    // city_edit
                    if (preg_match('#^/heaven/city/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::editAction',));
                    }

                    // city_update
                    if (preg_match('#^/heaven/city/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_city_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::updateAction',));
                    }
                    not_city_update:

                    // city_delete
                    if (preg_match('#^/heaven/city/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_city_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CityController::deleteAction',));
                    }
                    not_city_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/controllerlist')) {
                    // controllerlist
                    if (rtrim($pathinfo, '/') === '/heaven/controllerlist') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'controllerlist');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::indexAction',  '_route' => 'controllerlist',);
                    }

                    // controllerlist_show
                    if (preg_match('#^/heaven/controllerlist/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::showAction',));
                    }

                    // controllerlist_new
                    if ($pathinfo === '/heaven/controllerlist/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::newAction',  '_route' => 'controllerlist_new',);
                    }

                    // controllerlist_create
                    if ($pathinfo === '/heaven/controllerlist/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_controllerlist_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::createAction',  '_route' => 'controllerlist_create',);
                    }
                    not_controllerlist_create:

                    // controllerlist_edit
                    if (preg_match('#^/heaven/controllerlist/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::editAction',));
                    }

                    // controllerlist_update
                    if (preg_match('#^/heaven/controllerlist/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_controllerlist_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::updateAction',));
                    }
                    not_controllerlist_update:

                    // controllerlist_delete
                    if (preg_match('#^/heaven/controllerlist/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_controllerlist_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controllerlist_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ControllerlistController::deleteAction',));
                    }
                    not_controllerlist_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/criteria')) {
                    // criteria
                    if (rtrim($pathinfo, '/') === '/heaven/criteria') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'criteria');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::indexAction',  '_route' => 'criteria',);
                    }

                    // criteria_show
                    if (preg_match('#^/heaven/criteria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::showAction',));
                    }

                    // criteria_new
                    if ($pathinfo === '/heaven/criteria/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::newAction',  '_route' => 'criteria_new',);
                    }

                    // criteria_create
                    if ($pathinfo === '/heaven/criteria/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_criteria_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::createAction',  '_route' => 'criteria_create',);
                    }
                    not_criteria_create:

                    // criteria_edit
                    if (preg_match('#^/heaven/criteria/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::editAction',));
                    }

                    // criteria_update
                    if (preg_match('#^/heaven/criteria/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_criteria_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::updateAction',));
                    }
                    not_criteria_update:

                    // criteria_delete
                    if (preg_match('#^/heaven/criteria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_criteria_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'criteria_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\CriteriaController::deleteAction',));
                    }
                    not_criteria_delete:

                }

            }

            if (0 === strpos($pathinfo, '/heaven/education')) {
                // education
                if (rtrim($pathinfo, '/') === '/heaven/education') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'education');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::indexAction',  '_route' => 'education',);
                }

                // education_show
                if (preg_match('#^/heaven/education/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::showAction',));
                }

                // education_new
                if ($pathinfo === '/heaven/education/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::newAction',  '_route' => 'education_new',);
                }

                // education_create
                if ($pathinfo === '/heaven/education/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_education_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::createAction',  '_route' => 'education_create',);
                }
                not_education_create:

                // education_edit
                if (preg_match('#^/heaven/education/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::editAction',));
                }

                // education_update
                if (preg_match('#^/heaven/education/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_education_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::updateAction',));
                }
                not_education_update:

                // education_delete
                if (preg_match('#^/heaven/education/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_education_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'education_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\EducationController::deleteAction',));
                }
                not_education_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/fcomment')) {
                // fcomment
                if (rtrim($pathinfo, '/') === '/heaven/fcomment') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fcomment');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::indexAction',  '_route' => 'fcomment',);
                }

                // fcomment_show
                if (preg_match('#^/heaven/fcomment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::showAction',));
                }

                // fcomment_new
                if ($pathinfo === '/heaven/fcomment/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::newAction',  '_route' => 'fcomment_new',);
                }

                // fcomment_create
                if ($pathinfo === '/heaven/fcomment/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fcomment_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::createAction',  '_route' => 'fcomment_create',);
                }
                not_fcomment_create:

                // fcomment_edit
                if (preg_match('#^/heaven/fcomment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::editAction',));
                }

                // fcomment_update
                if (preg_match('#^/heaven/fcomment/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_fcomment_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::updateAction',));
                }
                not_fcomment_update:

                // fcomment_delete
                if (preg_match('#^/heaven/fcomment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_fcomment_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fcomment_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FcommentController::deleteAction',));
                }
                not_fcomment_delete:

            }

            // feeling
            if (rtrim($pathinfo, '/') === '/heaven') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'feeling');
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::indexAction',  '_route' => 'feeling',);
            }

            // feeling_show
            if (preg_match('#^/heaven/(?P<token>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::showAction',));
            }

            // feeling_new
            if ($pathinfo === '/heaven/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::newAction',  '_route' => 'feeling_new',);
            }

            // feeling_create
            if ($pathinfo === '/heaven/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_feeling_create;
                }

                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::createAction',  '_route' => 'feeling_create',);
            }
            not_feeling_create:

            // feeling_edit
            if (preg_match('#^/heaven/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::editAction',));
            }

            // feeling_update
            if (preg_match('#^/heaven/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_feeling_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::updateAction',));
            }
            not_feeling_update:

            // feeling_delete
            if (preg_match('#^/heaven/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_feeling_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feeling_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FeelingController::deleteAction',));
            }
            not_feeling_delete:

            if (0 === strpos($pathinfo, '/heaven/f')) {
                if (0 === strpos($pathinfo, '/heaven/flike')) {
                    // flike
                    if (rtrim($pathinfo, '/') === '/heaven/flike') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'flike');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::indexAction',  '_route' => 'flike',);
                    }

                    // flike_show
                    if (preg_match('#^/heaven/flike/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::showAction',));
                    }

                    // flike_new
                    if ($pathinfo === '/heaven/flike/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::newAction',  '_route' => 'flike_new',);
                    }

                    // flike_create
                    if (0 === strpos($pathinfo, '/heaven/flike/create') && preg_match('#^/heaven/flike/create/(?P<feel>[^/]++)/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_create')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::createAction',));
                    }

                    // flike_edit
                    if (preg_match('#^/heaven/flike/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::editAction',));
                    }

                    // flike_update
                    if (preg_match('#^/heaven/flike/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_flike_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::updateAction',));
                    }
                    not_flike_update:

                    // flike_delete
                    if (preg_match('#^/heaven/flike/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_flike_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'flike_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FlikeController::deleteAction',));
                    }
                    not_flike_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/friend')) {
                    // friend
                    if (rtrim($pathinfo, '/') === '/heaven/friend') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'friend');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::indexAction',  '_route' => 'friend',);
                    }

                    // friend_show
                    if (0 === strpos($pathinfo, '/heaven/friend/list') && preg_match('#^/heaven/friend/list/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::showAction',));
                    }

                    // friend_block
                    if (preg_match('#^/heaven/friend/(?P<token>[^/]++)/block$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_block')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::blockAction',));
                    }

                    // friend_fall
                    if (0 === strpos($pathinfo, '/heaven/friend/fall') && preg_match('#^/heaven/friend/fall/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_fall')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::showfallAction',));
                    }

                    // friend_new
                    if ($pathinfo === '/heaven/friend/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::newAction',  '_route' => 'friend_new',);
                    }

                    // friend_create
                    if (0 === strpos($pathinfo, '/heaven/friend/make') && preg_match('#^/heaven/friend/make/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_create')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::createAction',));
                    }

                    // friend_edit
                    if (preg_match('#^/heaven/friend/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::editAction',));
                    }

                    // friend_update
                    if (preg_match('#^/heaven/friend/(?P<token>[^/]++)/love$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::updateAction',));
                    }

                    // friend_delete
                    if (preg_match('#^/heaven/friend/(?P<token>[^/]++)/reject$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'friend_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FriendController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/heaven/fshare')) {
                    // fshare
                    if (rtrim($pathinfo, '/') === '/heaven/fshare') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'fshare');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::indexAction',  '_route' => 'fshare',);
                    }

                    // fshare_show
                    if (preg_match('#^/heaven/fshare/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::showAction',));
                    }

                    // fshare_new
                    if ($pathinfo === '/heaven/fshare/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::newAction',  '_route' => 'fshare_new',);
                    }

                    // fshare_create
                    if (0 === strpos($pathinfo, '/heaven/fshare/create') && preg_match('#^/heaven/fshare/create/(?P<feel>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_create')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::createAction',));
                    }

                    // fshare_edit
                    if (preg_match('#^/heaven/fshare/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::editAction',));
                    }

                    // fshare_update
                    if (preg_match('#^/heaven/fshare/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_fshare_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::updateAction',));
                    }
                    not_fshare_update:

                    // fshare_delete
                    if (preg_match('#^/heaven/fshare/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_fshare_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fshare_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\FshareController::deleteAction',));
                    }
                    not_fshare_delete:

                }

            }

            if (0 === strpos($pathinfo, '/heaven/g')) {
                if (0 === strpos($pathinfo, '/heaven/gallery')) {
                    // gallery
                    if (rtrim($pathinfo, '/') === '/heaven/gallery') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gallery');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::indexAction',  '_route' => 'gallery',);
                    }

                    // gallery_show
                    if (preg_match('#^/heaven/gallery/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::showAction',));
                    }

                    // gallery_new
                    if ($pathinfo === '/heaven/gallery/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::newAction',  '_route' => 'gallery_new',);
                    }

                    // gallery_create
                    if ($pathinfo === '/heaven/gallery/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_gallery_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::createAction',  '_route' => 'gallery_create',);
                    }
                    not_gallery_create:

                    // gallery_edit
                    if (preg_match('#^/heaven/gallery/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::editAction',));
                    }

                    // gallery_update
                    if (preg_match('#^/heaven/gallery/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_gallery_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::updateAction',));
                    }
                    not_gallery_update:

                    // gallery_delete
                    if (preg_match('#^/heaven/gallery/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_gallery_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gallery_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GalleryController::deleteAction',));
                    }
                    not_gallery_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/glike')) {
                    // glike
                    if (rtrim($pathinfo, '/') === '/heaven/glike') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'glike');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::indexAction',  '_route' => 'glike',);
                    }

                    // glike_show
                    if (preg_match('#^/heaven/glike/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::showAction',));
                    }

                    // glike_new
                    if ($pathinfo === '/heaven/glike/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::newAction',  '_route' => 'glike_new',);
                    }

                    // glike_create
                    if ($pathinfo === '/heaven/glike/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_glike_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::createAction',  '_route' => 'glike_create',);
                    }
                    not_glike_create:

                    // glike_edit
                    if (preg_match('#^/heaven/glike/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::editAction',));
                    }

                    // glike_update
                    if (preg_match('#^/heaven/glike/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_glike_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::updateAction',));
                    }
                    not_glike_update:

                    // glike_delete
                    if (preg_match('#^/heaven/glike/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_glike_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'glike_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GlikeController::deleteAction',));
                    }
                    not_glike_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/gcomment')) {
                    // gcomment
                    if (rtrim($pathinfo, '/') === '/heaven/gcomment') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gcomment');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::indexAction',  '_route' => 'gcomment',);
                    }

                    // gcomment_show
                    if (preg_match('#^/heaven/gcomment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::showAction',));
                    }

                    // gcomment_new
                    if ($pathinfo === '/heaven/gcomment/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::newAction',  '_route' => 'gcomment_new',);
                    }

                    // gcomment_create
                    if ($pathinfo === '/heaven/gcomment/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_gcomment_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::createAction',  '_route' => 'gcomment_create',);
                    }
                    not_gcomment_create:

                    // gcomment_edit
                    if (preg_match('#^/heaven/gcomment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::editAction',));
                    }

                    // gcomment_update
                    if (preg_match('#^/heaven/gcomment/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_gcomment_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::updateAction',));
                    }
                    not_gcomment_update:

                    // gcomment_delete
                    if (preg_match('#^/heaven/gcomment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_gcomment_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gcomment_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GcommentController::deleteAction',));
                    }
                    not_gcomment_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/gshare')) {
                    // gshare
                    if (rtrim($pathinfo, '/') === '/heaven/gshare') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gshare');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::indexAction',  '_route' => 'gshare',);
                    }

                    // gshare_show
                    if (preg_match('#^/heaven/gshare/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::showAction',));
                    }

                    // gshare_new
                    if ($pathinfo === '/heaven/gshare/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::newAction',  '_route' => 'gshare_new',);
                    }

                    // gshare_create
                    if ($pathinfo === '/heaven/gshare/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_gshare_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::createAction',  '_route' => 'gshare_create',);
                    }
                    not_gshare_create:

                    // gshare_edit
                    if (preg_match('#^/heaven/gshare/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::editAction',));
                    }

                    // gshare_update
                    if (preg_match('#^/heaven/gshare/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_gshare_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::updateAction',));
                    }
                    not_gshare_update:

                    // gshare_delete
                    if (preg_match('#^/heaven/gshare/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_gshare_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gshare_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\GshareController::deleteAction',));
                    }
                    not_gshare_delete:

                }

            }

            if (0 === strpos($pathinfo, '/heaven/hobby')) {
                // hobby
                if (rtrim($pathinfo, '/') === '/heaven/hobby') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'hobby');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::indexAction',  '_route' => 'hobby',);
                }

                // hobby_show
                if (preg_match('#^/heaven/hobby/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::showAction',));
                }

                // hobby_new
                if ($pathinfo === '/heaven/hobby/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::newAction',  '_route' => 'hobby_new',);
                }

                // hobby_create
                if ($pathinfo === '/heaven/hobby/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_hobby_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::createAction',  '_route' => 'hobby_create',);
                }
                not_hobby_create:

                // hobby_edit
                if (preg_match('#^/heaven/hobby/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::editAction',));
                }

                // hobby_update
                if (preg_match('#^/heaven/hobby/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_hobby_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::updateAction',));
                }
                not_hobby_update:

                // hobby_delete
                if (preg_match('#^/heaven/hobby/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_hobby_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'hobby_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\HobbyController::deleteAction',));
                }
                not_hobby_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/job')) {
                // job
                if (rtrim($pathinfo, '/') === '/heaven/job') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'job');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::indexAction',  '_route' => 'job',);
                }

                // job_show
                if (preg_match('#^/heaven/job/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::showAction',));
                }

                // job_new
                if ($pathinfo === '/heaven/job/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::newAction',  '_route' => 'job_new',);
                }

                // job_create
                if ($pathinfo === '/heaven/job/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_job_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::createAction',  '_route' => 'job_create',);
                }
                not_job_create:

                // job_edit
                if (preg_match('#^/heaven/job/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::editAction',));
                }

                // job_update
                if (preg_match('#^/heaven/job/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_job_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::updateAction',));
                }
                not_job_update:

                // job_delete
                if (preg_match('#^/heaven/job/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_job_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\JobController::deleteAction',));
                }
                not_job_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/methodlist')) {
                // methodlist
                if (rtrim($pathinfo, '/') === '/heaven/methodlist') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'methodlist');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::indexAction',  '_route' => 'methodlist',);
                }

                // methodlist_show
                if (preg_match('#^/heaven/methodlist/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::showAction',));
                }

                // methodlist_new
                if ($pathinfo === '/heaven/methodlist/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::newAction',  '_route' => 'methodlist_new',);
                }

                // methodlist_create
                if ($pathinfo === '/heaven/methodlist/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_methodlist_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::createAction',  '_route' => 'methodlist_create',);
                }
                not_methodlist_create:

                // methodlist_edit
                if (preg_match('#^/heaven/methodlist/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::editAction',));
                }

                // methodlist_update
                if (preg_match('#^/heaven/methodlist/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_methodlist_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::updateAction',));
                }
                not_methodlist_update:

                // methodlist_delete
                if (preg_match('#^/heaven/methodlist/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_methodlist_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'methodlist_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\MethodlistController::deleteAction',));
                }
                not_methodlist_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/notification')) {
                // notification
                if (rtrim($pathinfo, '/') === '/heaven/notification') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'notification');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::indexAction',  '_route' => 'notification',);
                }

                // notification_show
                if ($pathinfo === '/heaven/notification/see') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::showAction',  '_route' => 'notification_show',);
                }

                // notification_new
                if ($pathinfo === '/heaven/notification/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::newAction',  '_route' => 'notification_new',);
                }

                // notification_create
                if ($pathinfo === '/heaven/notification/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_notification_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::createAction',  '_route' => 'notification_create',);
                }
                not_notification_create:

                // notification_edit
                if (preg_match('#^/heaven/notification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::editAction',));
                }

                // notification_update
                if (preg_match('#^/heaven/notification/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_notification_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::updateAction',));
                }
                not_notification_update:

                // notification_delete
                if (preg_match('#^/heaven/notification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_notification_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\NotificationController::deleteAction',));
                }
                not_notification_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/p')) {
                if (0 === strpos($pathinfo, '/heaven/plan')) {
                    // plan
                    if (rtrim($pathinfo, '/') === '/heaven/plan') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'plan');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::indexAction',  '_route' => 'plan',);
                    }

                    // plan_show
                    if (preg_match('#^/heaven/plan/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::showAction',));
                    }

                    // plan_new
                    if ($pathinfo === '/heaven/plan/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::newAction',  '_route' => 'plan_new',);
                    }

                    // plan_create
                    if ($pathinfo === '/heaven/plan/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_plan_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::createAction',  '_route' => 'plan_create',);
                    }
                    not_plan_create:

                    // plan_edit
                    if (preg_match('#^/heaven/plan/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::editAction',));
                    }

                    // plan_update
                    if (preg_match('#^/heaven/plan/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_plan_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::updateAction',));
                    }
                    not_plan_update:

                    // plan_delete
                    if (preg_match('#^/heaven/plan/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_plan_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'plan_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\PlanController::deleteAction',));
                    }
                    not_plan_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/pro')) {
                    if (0 === strpos($pathinfo, '/heaven/profile')) {
                        // profile
                        if (rtrim($pathinfo, '/') === '/heaven/profile') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'profile');
                            }

                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::indexAction',  '_route' => 'profile',);
                        }

                        // profile_data
                        if ($pathinfo === '/heaven/profile/data') {
                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::profileAction',  '_route' => 'profile_data',);
                        }

                        // province_ajax_call
                        if ($pathinfo === '/heaven/profile/province_call') {
                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::ajaxAction',  '_route' => 'province_ajax_call',);
                        }

                        // profile_show
                        if ($pathinfo === '/heaven/profile/detail') {
                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::showAction',  '_route' => 'profile_show',);
                        }

                        // profile_see
                        if (preg_match('#^/heaven/profile/(?P<token>[^/]++)/see$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_see')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::seeAction',));
                        }

                        // profile_new
                        if ($pathinfo === '/heaven/profile/new') {
                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::newAction',  '_route' => 'profile_new',);
                        }

                        // profile_create
                        if ($pathinfo === '/heaven/profile/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_profile_create;
                            }

                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::createAction',  '_route' => 'profile_create',);
                        }
                        not_profile_create:

                        // profile_edit
                        if (preg_match('#^/heaven/profile/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::editAction',));
                        }

                        // profile_update
                        if (preg_match('#^/heaven/profile/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_profile_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::updateAction',));
                        }
                        not_profile_update:

                        // profile_delete
                        if (preg_match('#^/heaven/profile/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                                $allow = array_merge($allow, array('POST', 'DELETE'));
                                goto not_profile_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProfileController::deleteAction',));
                        }
                        not_profile_delete:

                    }

                    if (0 === strpos($pathinfo, '/heaven/province')) {
                        // province
                        if (rtrim($pathinfo, '/') === '/heaven/province') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'province');
                            }

                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::indexAction',  '_route' => 'province',);
                        }

                        // province_show
                        if (preg_match('#^/heaven/province/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::showAction',));
                        }

                        // province_new
                        if ($pathinfo === '/heaven/province/new') {
                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::newAction',  '_route' => 'province_new',);
                        }

                        // province_create
                        if ($pathinfo === '/heaven/province/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_province_create;
                            }

                            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::createAction',  '_route' => 'province_create',);
                        }
                        not_province_create:

                        // province_edit
                        if (preg_match('#^/heaven/province/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::editAction',));
                        }

                        // province_update
                        if (preg_match('#^/heaven/province/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_province_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'province_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ProvinceController::updateAction',));
                        }
                        not_province_update:

                        // province_delete
                        if (preg_match('#^/heaven/province/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
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

            if (0 === strpos($pathinfo, '/heaven/religy')) {
                // religy
                if (rtrim($pathinfo, '/') === '/heaven/religy') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'religy');
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::indexAction',  '_route' => 'religy',);
                }

                // religy_show
                if (preg_match('#^/heaven/religy/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::showAction',));
                }

                // religy_new
                if ($pathinfo === '/heaven/religy/new') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::newAction',  '_route' => 'religy_new',);
                }

                // religy_create
                if ($pathinfo === '/heaven/religy/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_religy_create;
                    }

                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::createAction',  '_route' => 'religy_create',);
                }
                not_religy_create:

                // religy_edit
                if (preg_match('#^/heaven/religy/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::editAction',));
                }

                // religy_update
                if (preg_match('#^/heaven/religy/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_religy_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::updateAction',));
                }
                not_religy_update:

                // religy_delete
                if (preg_match('#^/heaven/religy/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_religy_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'religy_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\ReligyController::deleteAction',));
                }
                not_religy_delete:

            }

            if (0 === strpos($pathinfo, '/heaven/s')) {
                if (0 === strpos($pathinfo, '/heaven/sallary')) {
                    // sallary
                    if (rtrim($pathinfo, '/') === '/heaven/sallary') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'sallary');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::indexAction',  '_route' => 'sallary',);
                    }

                    // sallary_show
                    if (preg_match('#^/heaven/sallary/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::showAction',));
                    }

                    // sallary_new
                    if ($pathinfo === '/heaven/sallary/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::newAction',  '_route' => 'sallary_new',);
                    }

                    // sallary_create
                    if ($pathinfo === '/heaven/sallary/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sallary_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::createAction',  '_route' => 'sallary_create',);
                    }
                    not_sallary_create:

                    // sallary_edit
                    if (preg_match('#^/heaven/sallary/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::editAction',));
                    }

                    // sallary_update
                    if (preg_match('#^/heaven/sallary/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_sallary_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::updateAction',));
                    }
                    not_sallary_update:

                    // sallary_delete
                    if (preg_match('#^/heaven/sallary/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_sallary_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sallary_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SallaryController::deleteAction',));
                    }
                    not_sallary_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/sex')) {
                    // sex
                    if (rtrim($pathinfo, '/') === '/heaven/sex') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'sex');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::indexAction',  '_route' => 'sex',);
                    }

                    // sex_show
                    if (preg_match('#^/heaven/sex/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::showAction',));
                    }

                    // sex_new
                    if ($pathinfo === '/heaven/sex/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::newAction',  '_route' => 'sex_new',);
                    }

                    // sex_create
                    if ($pathinfo === '/heaven/sex/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sex_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::createAction',  '_route' => 'sex_create',);
                    }
                    not_sex_create:

                    // sex_edit
                    if (preg_match('#^/heaven/sex/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::editAction',));
                    }

                    // sex_update
                    if (preg_match('#^/heaven/sex/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_sex_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::updateAction',));
                    }
                    not_sex_update:

                    // sex_delete
                    if (preg_match('#^/heaven/sex/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_sex_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sex_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\SexController::deleteAction',));
                    }
                    not_sex_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/status')) {
                    // status
                    if (rtrim($pathinfo, '/') === '/heaven/status') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'status');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::indexAction',  '_route' => 'status',);
                    }

                    // status_show
                    if (preg_match('#^/heaven/status/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::showAction',));
                    }

                    // status_new
                    if ($pathinfo === '/heaven/status/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::newAction',  '_route' => 'status_new',);
                    }

                    // status_create
                    if ($pathinfo === '/heaven/status/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_status_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::createAction',  '_route' => 'status_create',);
                    }
                    not_status_create:

                    // status_edit
                    if (preg_match('#^/heaven/status/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::editAction',));
                    }

                    // status_update
                    if (preg_match('#^/heaven/status/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_status_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::updateAction',));
                    }
                    not_status_update:

                    // status_delete
                    if (preg_match('#^/heaven/status/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_status_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'status_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\StatusController::deleteAction',));
                    }
                    not_status_delete:

                }

            }

            // user
            if ($pathinfo === '/heaven/user') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_search
            if ($pathinfo === '/heaven/cari') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::searchAction',  '_route' => 'user_search',);
            }

            // user_others
            if ($pathinfo === '/heaven/all') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::allAction',  '_route' => 'user_others',);
            }

        }

        // user_wait
        if ($pathinfo === '/thanks') {
            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::waitAction',  '_route' => 'user_wait',);
        }

        if (0 === strpos($pathinfo, '/heaven')) {
            // user_foto
            if ($pathinfo === '/heaven/foto') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::fotoAction',  '_route' => 'user_foto',);
            }

            // user_pass
            if ($pathinfo === '/heaven/pass') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::changePasswdAction',  '_route' => 'user_pass',);
            }

            // user_show
            if (preg_match('#^/heaven/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::showAction',));
            }

            // user_new
            if ($pathinfo === '/heaven/new') {
                return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

        }

        // user_create
        if ($pathinfo === '/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_user_create;
            }

            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
        }
        not_user_create:

        // user_edit
        if (0 === strpos($pathinfo, '/heaven') && preg_match('#^/heaven/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::editAction',));
        }

        // user_activate
        if (0 === strpos($pathinfo, '/activate') && preg_match('#^/activate/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_activate')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::activateAction',));
        }

        if (0 === strpos($pathinfo, '/heaven')) {
            // user_update
            if (preg_match('#^/heaven/(?P<token>[^/]++)/renew$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/heaven/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

            if (0 === strpos($pathinfo, '/heaven/user')) {
                if (0 === strpos($pathinfo, '/heaven/usercriteria')) {
                    // usercriteria
                    if (rtrim($pathinfo, '/') === '/heaven/usercriteria') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'usercriteria');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::indexAction',  '_route' => 'usercriteria',);
                    }

                    // usercriteria_show
                    if (preg_match('#^/heaven/usercriteria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::showAction',));
                    }

                    // usercriteria_new
                    if ($pathinfo === '/heaven/usercriteria/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::newAction',  '_route' => 'usercriteria_new',);
                    }

                    // usercriteria_create
                    if ($pathinfo === '/heaven/usercriteria/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_usercriteria_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::createAction',  '_route' => 'usercriteria_create',);
                    }
                    not_usercriteria_create:

                    // usercriteria_edit
                    if (preg_match('#^/heaven/usercriteria/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::editAction',));
                    }

                    // usercriteria_update
                    if (preg_match('#^/heaven/usercriteria/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_usercriteria_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::updateAction',));
                    }
                    not_usercriteria_update:

                    // usercriteria_delete
                    if (preg_match('#^/heaven/usercriteria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_usercriteria_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercriteria_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UsercriteriaController::deleteAction',));
                    }
                    not_usercriteria_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/userdoing')) {
                    // userdoing
                    if (rtrim($pathinfo, '/') === '/heaven/userdoing') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'userdoing');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::indexAction',  '_route' => 'userdoing',);
                    }

                    // userdoing_show
                    if (preg_match('#^/heaven/userdoing/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::showAction',));
                    }

                    // userdoing_new
                    if ($pathinfo === '/heaven/userdoing/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::newAction',  '_route' => 'userdoing_new',);
                    }

                    // userdoing_create
                    if ($pathinfo === '/heaven/userdoing/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_userdoing_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::createAction',  '_route' => 'userdoing_create',);
                    }
                    not_userdoing_create:

                    // userdoing_edit
                    if (preg_match('#^/heaven/userdoing/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::editAction',));
                    }

                    // userdoing_update
                    if (preg_match('#^/heaven/userdoing/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_userdoing_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::updateAction',));
                    }
                    not_userdoing_update:

                    // userdoing_delete
                    if (preg_match('#^/heaven/userdoing/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_userdoing_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userdoing_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserdoingController::deleteAction',));
                    }
                    not_userdoing_delete:

                }

                if (0 === strpos($pathinfo, '/heaven/userlog')) {
                    // userlog
                    if (rtrim($pathinfo, '/') === '/heaven/userlog') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'userlog');
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::indexAction',  '_route' => 'userlog',);
                    }

                    // userlog_show
                    if (preg_match('#^/heaven/userlog/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userlog_show')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::showAction',));
                    }

                    // userlog_new
                    if ($pathinfo === '/heaven/userlog/new') {
                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::newAction',  '_route' => 'userlog_new',);
                    }

                    // userlog_create
                    if ($pathinfo === '/heaven/userlog/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_userlog_create;
                        }

                        return array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::createAction',  '_route' => 'userlog_create',);
                    }
                    not_userlog_create:

                    // userlog_edit
                    if (preg_match('#^/heaven/userlog/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userlog_edit')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::editAction',));
                    }

                    // userlog_update
                    if (preg_match('#^/heaven/userlog/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_userlog_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userlog_update')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::updateAction',));
                    }
                    not_userlog_update:

                    // userlog_delete
                    if (preg_match('#^/heaven/userlog/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_userlog_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userlog_delete')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\UserlogController::deleteAction',));
                    }
                    not_userlog_delete:

                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // repair
        if (0 === strpos($pathinfo, '/repair') && preg_match('#^/repair/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'repair')), array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::repairAction',));
        }

        // forgot
        if ($pathinfo === '/forgot') {
            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::forgotAction',  '_route' => 'forgot',);
        }

        // agreement
        if ($pathinfo === '/agreement') {
            return array (  '_controller' => 'Lc\\LcBundle\\Controller\\DefaultController::agreementAction',  '_route' => 'agreement',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // base_url
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'base_url');
            }

            return array('_route' => 'base_url');
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/login')) {
            // hwi_oauth_connect
            if (rtrim($pathinfo, '/') === '/login') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hwi_oauth_connect');
                }

                return array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectAction',  '_route' => 'hwi_oauth_connect',);
            }

            // hwi_oauth_connect_service
            if (0 === strpos($pathinfo, '/login/service') && preg_match('#^/login/service/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_service')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectServiceAction',));
            }

            // hwi_oauth_connect_registration
            if (0 === strpos($pathinfo, '/login/registration') && preg_match('#^/login/registration/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_registration')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::registrationAction',));
            }

            // hwi_oauth_service_redirect
            if (preg_match('#^/login/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_service_redirect')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::redirectToServiceAction',));
            }

            if (0 === strpos($pathinfo, '/login/check-')) {
                // facebook_login
                if ($pathinfo === '/login/check-facebook') {
                    return array('_route' => 'facebook_login');
                }

                // google_login
                if ($pathinfo === '/login/check-google') {
                    return array('_route' => 'google_login');
                }

            }

        }

        // _welcome
        if ($pathinfo === '/welcome') {
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
