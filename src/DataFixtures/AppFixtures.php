<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Applicant;
use App\Entity\ApplicantOffer;
use App\Entity\Company;
use App\Entity\Offer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $encoder;

    public function load(ObjectManager $manager)
    {
        //generar 5 usuarios
        $user = new User();
        $user->setEmail("admin@admin.com");
        $user->setRoles((array)"ROLE_ADMIN");
        //$password = $this->encoder->encodePassword('pass_1234');
        //$user->setPassword($password);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$zHd8/9QmaFCkXITvBXNcKg$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I');
        $user->setIsVerified(1);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("aplicante1@aplicant.com");
        $user->setRoles((array)"ROLE_APPLICANT");
        //$password = $this->encoder->encodePassword('pass_1234');
        //$user->setPassword($password);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$zHd8/9QmaFCkXITvBXNcKg$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I');
        $user->setIsVerified(1);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("aplicante2@aplicant.com");
        $user->setRoles((array)"ROLE_APPLICANT");
        //$password = $this->encoder->encodePassword('pass_1234');
        //$user->setPassword($password);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$zHd8/9QmaFCkXITvBXNcKg$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I');
        $user->setIsVerified(1);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("company1@company.com");
        $user->setRoles((array)"ROLE_COMPANY");
        //$password = $this->encoder->encodePassword('pass_1234');
        //$user->setPassword($password);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$zHd8/9QmaFCkXITvBXNcKg$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I');
        $user->setIsVerified(1);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("company2@company.com");
        $user->setRoles((array)"ROLE_COMPANY");
        //$password = $this->encoder->encodePassword('pass_1234');
        //$user->setPassword($password);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$zHd8/9QmaFCkXITvBXNcKg$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I');
        $user->setIsVerified(1);
        $manager->persist($user);

        //generar 5 empresas
        for ($i = 0; $i < 5; $i++) {
            $company = new Company();
            $company->setName('company '.$i);
            $company->setEmail("company$i@company.com");
            $manager->persist($company);

            //generar 10 ofertas
            for ($j = 0; $j < 2; $j++) {
                $applicant = new Applicant();
                $applicant->setName('applicant'.bin2hex(random_bytes(4)));
                $manager->persist($applicant);

                //generar 20 aplicantes
                for ($k = 0; $k < 2; $k++) {
                    $offer = new Offer();

                    $offer->setName('oferta '.bin2hex(random_bytes(4)));
                    $offer->setOwner($company);
                    $manager->persist($offer);

                    $applicantOffer = new ApplicantOffer();
                    $applicantOffer->setApplicantId($applicant);
                    $applicantOffer->setOfferId($offer);
                    $manager->persist($applicantOffer);
                }
            }
        }

        $manager->flush();
    }
}