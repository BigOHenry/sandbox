<?php declare(strict_types=1);

namespace App\Components\UserDatagrid;

use Dibi\Connection;
use Dibi\Exception;
use Nette\Application\AbortException;
use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;
use Ublaboo\DataGrid\DataGrid;
use Ublaboo\DataGrid\Exception\DataGridColumnStatusException;
use Ublaboo\DataGrid\Exception\DataGridException;

/**
 * Class UserDatagridControl
 * @package App\Components\UserDatagrid
 */
class UserDatagridControl extends Control
{
    /**
     * @var Connection
     */
    public $db;

    /**
     * UserDatagridControl constructor.
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     *
     */
    public function render(): void
    {
        /** @var Template $template */
        $template = $this->template;
        $template->setFile(__DIR__ . '/userDatagrid.latte');
        $template->render();
    }

    /**
     * @param string $name
     * @return DataGrid
     * @throws DataGridColumnStatusException
     * @throws DataGridException
     */
    public function createComponentUserDatagrid(string $name): DataGrid
    {
        $grid = new DataGrid($this, $name);
        $grid->setRefreshUrl(false);
        $grid->setStrictSessionFilterValues(false);
        $grid->setRememberState(true);

        $grid->setPrimaryKey('id');

        $grid->setDataSource(
            $this->db
            ->select('
                id
                , int
                , int2
                , string
                , string2
                , bool
                , bool2
                , bool_varchar
                , bool_varchar2
            ')
            ->from('(
                SELECT id
                , int AS int
                , int AS int2
                , string AS string
                , string AS string2
                , bool AS bool
                , bool AS bool2
                , bool_varchar AS bool_varchar
                , bool_varchar AS bool_varchar2
                FROM test_table
            ) fin')
        );

        $grid->addColumnText('id', "id")
            ->setSortable();

        // int
        $int_options = [
            '' => 'empty string',
            null => 'null',
            0 => '0',
            1 => '1',
        ];

        $grid->addColumnStatus("int", 'int - setOptions')
             ->setSortable()
             ->setOptions($int_options)
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("int", "Search", $int_options);

        $grid->addColumnStatus('int2', 'int - addOption')
             ->setSortable()
             ->addOption('', 'empty string')
             ->endOption()
//             ->addOption(null, 'empty string') - Option value has to be scalar
//             ->endOption()
             ->addOption(0, '0')
             ->endOption()
             ->addOption(1, '1')
             ->endOption()
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("int2", "Search", $int_options);


        // string
        $string_options = [
            '' => 'empty string',
            null => 'null',
            '0' => '0',
            '1' => '1',
        ];

        $grid->addColumnStatus("string", 'string - setOptions')
             ->setSortable()
             ->setOptions($string_options)
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("string", "Search", $string_options);

        $grid->addColumnStatus('string2', 'string - addOption')
             ->setSortable()
             ->addOption('', 'empty string')
             ->endOption()
//             ->addOption(null, 'empty string') //- Option value has to be scalar
//             ->endOption()
             ->addOption('0', '0')
             ->endOption()
             ->addOption('1', '1')
             ->endOption()
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("string2", "Search", $string_options);

        // bool
        $bool_options = [
            '' => 'empty string',
            null => 'null',
            false => 'false',
            true => 'true',
        ];

        $grid->addColumnStatus("bool", 'bool - setOptions')
             ->setSortable()
             ->setOptions($bool_options)
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("bool", "Search", $bool_options);

        $grid->addColumnStatus('bool2', 'bool - addOption')
             ->setSortable()
             ->addOption('', 'empty string')
             ->endOption()
//             ->addOption(null, 'empty string') // - Option value has to be scalar
//             ->endOption()
             ->addOption(false, 'false')
             ->endOption()
             ->addOption(true, 'true')
             ->endOption()
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("bool2", "Search", $bool_options);

        // bool_varchar
        $bool_varchar_options = [
            '' => 'empty string',
            null => 'null',
            'false' => 'false',
            'true' => 'true',
        ];

        $grid->addColumnStatus("bool_varchar", 'bool_varchar - setOptions')
             ->setSortable()
             ->setOptions($bool_varchar_options)
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("bool_varchar", "Search", $bool_varchar_options);

        $grid->addColumnStatus('bool_varchar2', 'bool_varchar - addOption')
             ->setSortable()
             ->addOption('', 'empty string')
             ->endOption()
//             ->addOption(null, 'empty string') // - Option value has to be scalar
//             ->endOption()
             ->addOption('false', 'false')
             ->endOption()
             ->addOption('true', 'true')
             ->endOption()
            ->onChange[] = [$this, 'localeChange'];

        $grid->addFilterMultiSelect("bool_varchar2", "Search", $bool_varchar_options);

        return $grid;
    }

    /**
     * @param string $id
     * @param string $locale
     */
    public function localeChange(string $id, string $locale): void
    {

//        $this->appuserManager->updateAppuser(intval($id), ['id_locale' => intval($locale)]);
//        $this->redirect('this');
    }
}