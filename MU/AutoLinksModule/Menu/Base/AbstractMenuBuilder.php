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

namespace MU\AutoLinksModule\Menu\Base;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Zikula\Common\Translator\TranslatorInterface;
use Zikula\Common\Translator\TranslatorTrait;
use Zikula\UsersModule\Constant as UsersConstant;
use MU\AutoLinksModule\Entity\AutoLinkEntity;
use MU\AutoLinksModule\AutoLinksEvents;
use MU\AutoLinksModule\Event\ConfigureItemActionsMenuEvent;
use MU\AutoLinksModule\Helper\PermissionHelper;
use Zikula\UsersModule\Api\ApiInterface\CurrentUserApiInterface;

/**
 * Menu builder base class.
 */
class AbstractMenuBuilder
{
    use TranslatorTrait;

    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var PermissionHelper
     */
    protected $permissionHelper;

    /**
     * @var CurrentUserApiInterface
     */
    protected $currentUserApi;

    /**
     * MenuBuilder constructor.
     *
     * @param TranslatorInterface      $translator          Translator service instance
     * @param FactoryInterface         $factory             Factory service instance
     * @param EventDispatcherInterface $eventDispatcher     EventDispatcher service instance
     * @param RequestStack             $requestStack        RequestStack service instance
     * @param PermissionHelper         $permissionHelper    PermissionHelper service instance
     * @param CurrentUserApiInterface  $currentUserApi      CurrentUserApi service instance
     */
    public function __construct(
        TranslatorInterface $translator,
        FactoryInterface $factory,
        EventDispatcherInterface $eventDispatcher,
        RequestStack $requestStack,
        PermissionHelper $permissionHelper,
        CurrentUserApiInterface $currentUserApi)
    {
        $this->setTranslator($translator);
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
        $this->requestStack = $requestStack;
        $this->permissionHelper = $permissionHelper;
        $this->currentUserApi = $currentUserApi;
    }

    /**
     * Sets the translator.
     *
     * @param TranslatorInterface $translator Translator service instance
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Builds the item actions menu.
     *
     * @param array $options List of additional options
     *
     * @return ItemInterface The assembled menu
     */
    public function createItemActionsMenu(array $options = [])
    {
        $menu = $this->factory->createItem('itemActions');
        if (!isset($options['entity']) || !isset($options['area']) || !isset($options['context'])) {
            return $menu;
        }

        $entity = $options['entity'];
        $routeArea = $options['area'];
        $context = $options['context'];
        $menu->setChildrenAttribute('class', 'list-inline item-actions');

        $this->eventDispatcher->dispatch(AutoLinksEvents::MENU_ITEMACTIONS_PRE_CONFIGURE, new ConfigureItemActionsMenuEvent($this->factory, $menu, $options));

        $currentUserId = $this->currentUserApi->isLoggedIn() ? $this->currentUserApi->get('uid') : UsersConstant::USER_ID_ANONYMOUS;
        if ($entity instanceof AutoLinkEntity) {
            $routePrefix = 'muautolinksmodule_autolink_';
        
            if ($this->permissionHelper->mayEdit($entity)) {
                $title = $this->__('Edit', 'muautolinksmodule');
                $menu->addChild($title, [
                    'route' => $routePrefix . $routeArea . 'edit',
                    'routeParameters' => $entity->createUrlArgs()
                ]);
                $menu[$title]->setLinkAttribute('title', $this->__('Edit this auto link', 'muautolinksmodule'));
                $menu[$title]->setAttribute('icon', 'fa fa-pencil-square-o');
                $title = $this->__('Reuse', 'muautolinksmodule');
                $menu->addChild($title, [
                    'route' => $routePrefix . $routeArea . 'edit',
                    'routeParameters' => ['astemplate' => $entity->getKey()]
                ]);
                $menu[$title]->setLinkAttribute('title', $this->__('Reuse for new auto link', 'muautolinksmodule'));
                $menu[$title]->setAttribute('icon', 'fa fa-files-o');
            }
            if ($this->permissionHelper->mayDelete($entity)) {
                $title = $this->__('Delete', 'muautolinksmodule');
                $menu->addChild($title, [
                    'route' => $routePrefix . $routeArea . 'delete',
                    'routeParameters' => $entity->createUrlArgs()
                ]);
                $menu[$title]->setLinkAttribute('title', $this->__('Delete this auto link', 'muautolinksmodule'));
                $menu[$title]->setAttribute('icon', 'fa fa-trash-o');
            }
        }

        $this->eventDispatcher->dispatch(AutoLinksEvents::MENU_ITEMACTIONS_POST_CONFIGURE, new ConfigureItemActionsMenuEvent($this->factory, $menu, $options));

        return $menu;
    }
}
