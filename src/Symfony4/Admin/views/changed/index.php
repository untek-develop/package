<?php

/**
 * @var $this \Untek\Component\Web\HtmlRender\Application\Services\View
 * @var $formView FormView|AbstractType[]
 * @var $formRender \Untek\Component\Web\Form\Libs\FormRender
 * @var $dataProvider DataProvider
 * @var $baseUri string
 * @var $packageCollection \Untek\Core\Collection\Interfaces\Enumerable | \Untek\Develop\Bundle\Domain\Entities\BundleEntity[]
 */

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Untek\Model\DataProvider\Libs\DataProvider;
use Untek\Develop\Package\Domain\Entities\ApiKeyEntity;

//dd($this->translate('core', 'action.send'));
?>

<div class="row">
    <div class="col-lg-12">
        <div class="list-group">
            <?php foreach ($packageCollection as $packageEntity): ?>
            <a href="<?= $this->url('package/changed/view', ['id' => $packageEntity->getId()]) ?>" class="list-group-item list-group-item-action ">
                <?= $packageEntity->getId() ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
