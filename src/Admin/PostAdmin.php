<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 16/05/18
 * Time: 00:19
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('title')
            ->add('body')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title');
    }

}