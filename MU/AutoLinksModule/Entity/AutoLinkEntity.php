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

namespace MU\AutoLinksModule\Entity;

use MU\AutoLinksModule\Entity\Base\AbstractAutoLinkEntity as BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entity class that defines the entity structure and behaviours.
 *
 * This is the concrete entity class for auto link entities.
 * @ORM\Entity(repositoryClass="MU\AutoLinksModule\Entity\Repository\AutoLinkRepository")
 * @ORM\Table(name="mu_autolinks_autolink",
 *     indexes={
 *         @ORM\Index(name="workflowstateindex", columns={"workflowState"})
 *     }
 * )
 */
class AutoLinkEntity extends BaseEntity
{
    // feel free to add your own methods here
}
