<?php

namespace App\Controller\Admin;

use App\Entity\User;
use ContainerGd3yaIS\getFieldCollectionService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    /*public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            ChoiceField::new('roles')->setChoices(
                ChoiceType::class,
                [
                    'choices' => [
                        'Administrador' => 'ROLE_ADMIN',
                        'Empresa' => 'ROLE_COMPANY',
                        'Postulante' => 'ROLE_APPLICANT',
                    ],
                    'multiple' => true,
                    'expanded' => true,
                ]
            ),
            TextField::new('password'),
        ];
    }*/
}
