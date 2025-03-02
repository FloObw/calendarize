<?php

declare(strict_types=1);

namespace HDNET\Calendarize\Widgets\DataProvider;

use HDNET\Calendarize\Domain\Model\Index;
use HDNET\Calendarize\Domain\Model\Request\OptionRequest;
use HDNET\Calendarize\Domain\Repository\IndexRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

class NextEventsDataProvider implements ListDataProviderInterface
{
    /**
     * The index repository.
     *
     * @var \HDNET\Calendarize\Domain\Repository\IndexRepository
     */
    protected $indexRepository;

    public function injectIndexRepository(IndexRepository $indexRepository)
    {
        $this->indexRepository = $indexRepository;
    }

    public function getItems(): array
    {
        $options = new OptionRequest();
        // @todo create new backend functions
        $indices = \array_slice($this->indexRepository->findAllForBackend($options)->toArray(), 0, 15);

        return array_map(function (Index $index) {
            try {
                /** @var StandaloneView $standaloneView */
                $standaloneView = GeneralUtility::makeInstance(StandaloneView::class);
                // @todo load paths via "module.tx_calendarize.view.partialRootPaths" TS
                $standaloneView->setPartialRootPaths(['EXT:calendarize/Resources/Private/Partials/', 'EXT:calendarize_premium/Resources/Private/Partials/']);

                $titlePartial = $index->getConfiguration()['partialIdentifier'] . '/Title';

                return $standaloneView->renderPartial($titlePartial, null, ['index' => $index]);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }, $indices);
    }
}
