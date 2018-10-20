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

namespace MU\AutoLinksModule\HookProvider;

use Zikula\Bundle\HookBundle\Hook\FilterHook;
use MU\AutoLinksModule\HookProvider\Base\AbstractFilterHooksProvider;

use MU\AutoLinksModule\Entity\Factory\EntityFactory;
use Zikula\Common\Translator\TranslatorInterface;
use Zikula\ExtensionsModule\Api\ApiInterface\VariableApiInterface;

/**
 * Implementation class for filter hooks provider.
 */
class FilterHooksProvider extends AbstractFilterHooksProvider
{
    /**
     * @var EntityFactory
     */
    protected $entityFactory;
    
    /**
     * @var VariableApiInterface
     */
    protected $variableApi;
    
    /**
     * FilterHooksProvider constructor.
     *
     * @param TranslatorInterface $translator
     * @param EntityFactory $entityFactory
     * @param VariableApiInterface $variableApi      VariableApi service instance
     */
    public function __construct(
        TranslatorInterface $translator,
        EntityFactory $entityFactory,
        VariableApiInterface $variableApi
        )
    {
        $this->translator = $translator;
        $this->entityFactory = $entityFactory;
        $this->variableApi = $variableApi;
    }
    
    /**
     * @inheritDoc
     */
    public function applyFilter(FilterHook $hook)
    {
        $content = $hook->getData();
        $autoLinks = array();
        $linkRepository = $this->entityFactory->getRepository('autoLink');
        $autoLinks = $linkRepository->findAll();
        foreach ($autoLinks as $autoLink) {
            $setAsterisk = $autoLink['setAsterisk'];
            if ($setAsterisk == 1) {
                $asterisk = '*';
            } else {
                $asterisk = '';
            }
            $content = str_replace('#' . $autoLink['supportedString'] . '#', '<a title="' . $autoLink['descriptionForLink'] . '" href="' . $autoLink['neededLink'] . '">' . ' ' . $autoLink['supportedString'] . '</a>' . $asterisk, $content);
        }
        $hook->setData($content);
    }
    
    protected function setEntityFactory(EntityFactory $entityFactory) {
        $this->entityFactory = $entityFactory;
    }
    
    protected function setVariableApi(VariableApiInterface $variableApi) {
        $this->variableApi = $variableApi;
    }

    // feel free to add your own convenience methods here
}
