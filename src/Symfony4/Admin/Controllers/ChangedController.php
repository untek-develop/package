<?php

namespace Untek\Develop\Package\Symfony4\Admin\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Untek\Core\Collection\Helpers\CollectionHelper;
use Untek\Model\Entity\Helpers\EntityHelper;
use Untek\Component\Web\Controller\Base\BaseWebController;
use Untek\Component\Web\Controller\Interfaces\ControllerAccessInterface;
use Untek\Component\Web\Form\Libs\FormManager;
use Untek\FrameworkPlugin\HttpLayout\Infrastructure\Libs\LayoutManager;
use Untek\Develop\Package\Domain\Entities\FavoriteEntity;
use Untek\Develop\Package\Domain\Helpers\FavoriteHelper;
use Untek\Develop\Package\Domain\Helpers\TableMapperHelper;
use Untek\Develop\Package\Domain\Interfaces\Services\ClientServiceInterface;
use Untek\Develop\Package\Domain\Interfaces\Services\FavoriteServiceInterface;
use Untek\Develop\Package\Domain\Interfaces\Services\GitServiceInterface;
use Untek\Develop\Package\Domain\Interfaces\Services\PackageServiceInterface;
use Untek\Develop\Package\Domain\Repositories\Eloquent\SchemaRepository;
use Untek\User\Rbac\Domain\Enums\Rbac\ExtraPermissionEnum;

class ChangedController extends BaseWebController implements ControllerAccessInterface
{

    protected $viewsDir = __DIR__ . '/../views/changed';
    protected $baseUri = '/package/changed';
//    protected $formClass = RequestForm::class;
    private $layoutManager;
    private $packageService;
    private $gitService;

    public function __construct(
        FormManager $formManager,
        LayoutManager $layoutManager,
        UrlGeneratorInterface $urlGenerator,
        PackageServiceInterface $packageService,
        GitServiceInterface $gitService
    )
    {
        $this->setFormManager($formManager);
        $this->setLayoutManager($layoutManager);
        $this->setUrlGenerator($urlGenerator);
        $this->setBaseRoute('package/changed');

        $this->packageService = $packageService;
        $this->gitService = $gitService;

        $this->getLayoutManager()->addBreadcrumb('Changed', 'package/changed');
    }

    /*public function with(): array
    {
        return [
            'application',
        ];
    }*/

    public function access(): array
    {
        return [
            'index' => [
                ExtraPermissionEnum::ADMIN_ONLY,
            ],
            'view' => [
                ExtraPermissionEnum::ADMIN_ONLY,
            ],
        ];
    }

    public function index(Request $request): Response
    {
        //$bundleCollection = $this->->findAll();
        $packageCollection = $this->packageService->findAll();
        //dd($packageCollection);
        return $this->render('index', [
            'packageCollection' => $packageCollection,
        ]);
    }

    public function view(Request $request): Response
    {
        $id = $request->query->get('id');
        $bundleEntity = $this->bundleService->findOneById($id);
//dd($bundleEntity);

        if($bundleEntity->getDomain()) {

        }
        $tableCollection = $this->schemaRepository->allTables();
        $tableList = CollectionHelper::getColumn($tableCollection, 'name');
        $entityNames = [];
        foreach ($tableList as $tableName) {
            $bundleName = TableMapperHelper::extractDomainNameFromTable($tableName);
            if ($bundleEntity->getDomain()->getName() == $bundleName) {
                $entityNames[] = TableMapperHelper::extractEntityNameFromTable($tableName);
            }
        }
        dd($entityNames);

    }
}
