<?php
/**
 * AutoLinks.
 *
 * @copyright Michael Ueberschaer (MU)
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @author Michael Ueberschaer <info@homepages-mit-zikula.de>.
 * @link https://homepages-mit-zikula.de
 * @link https://ziku.la
 * @version Generated by ModuleStudio (https://modulestudio.de).
 */

namespace MU\AutoLinksModule\Base;

use MU\AutoLinksModule\Listener\EntityLifecycleListener;

/**
 * Events definition base class.
 */
abstract class AbstractAutoLinksEvents
{
    /**
     * The muautolinksmodule.itemactionsmenu_pre_configure event is thrown before the item actions
     * menu is built in the menu builder.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\ConfigureItemActionsMenuEvent instance.
     *
     * @see MU\AutoLinksModule\Menu\MenuBuilder::createItemActionsMenu()
     * @var string
     */
    const MENU_ITEMACTIONS_PRE_CONFIGURE = 'muautolinksmodule.itemactionsmenu_pre_configure';
    
    /**
     * The muautolinksmodule.itemactionsmenu_post_configure event is thrown after the item actions
     * menu has been built in the menu builder.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\ConfigureItemActionsMenuEvent instance.
     *
     * @see MU\AutoLinksModule\Menu\MenuBuilder::createItemActionsMenu()
     * @var string
     */
    const MENU_ITEMACTIONS_POST_CONFIGURE = 'muautolinksmodule.itemactionsmenu_post_configure';
    /**
     * The muautolinksmodule.autolink_post_load event is thrown when auto links
     * are loaded from the database.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::postLoad()
     * @var string
     */
    const AUTOLINK_POST_LOAD = 'muautolinksmodule.autolink_post_load';
    
    /**
     * The muautolinksmodule.autolink_pre_persist event is thrown before a new auto link
     * is created in the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::prePersist()
     * @var string
     */
    const AUTOLINK_PRE_PERSIST = 'muautolinksmodule.autolink_pre_persist';
    
    /**
     * The muautolinksmodule.autolink_post_persist event is thrown after a new auto link
     * has been created in the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::postPersist()
     * @var string
     */
    const AUTOLINK_POST_PERSIST = 'muautolinksmodule.autolink_post_persist';
    
    /**
     * The muautolinksmodule.autolink_pre_remove event is thrown before an existing auto link
     * is removed from the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::preRemove()
     * @var string
     */
    const AUTOLINK_PRE_REMOVE = 'muautolinksmodule.autolink_pre_remove';
    
    /**
     * The muautolinksmodule.autolink_post_remove event is thrown after an existing auto link
     * has been removed from the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::postRemove()
     * @var string
     */
    const AUTOLINK_POST_REMOVE = 'muautolinksmodule.autolink_post_remove';
    
    /**
     * The muautolinksmodule.autolink_pre_update event is thrown before an existing auto link
     * is updated in the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::preUpdate()
     * @var string
     */
    const AUTOLINK_PRE_UPDATE = 'muautolinksmodule.autolink_pre_update';
    
    /**
     * The muautolinksmodule.autolink_post_update event is thrown after an existing new auto link
     * has been updated in the system.
     *
     * The event listener receives an
     * MU\AutoLinksModule\Event\FilterAutoLinkEvent instance.
     *
     * @see EntityLifecycleListener::postUpdate()
     * @var string
     */
    const AUTOLINK_POST_UPDATE = 'muautolinksmodule.autolink_post_update';
    
}