<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            // These are the other bundles the SonataAdminBundle relies on
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            // And finally, the storage and SonataAdminBundle
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Sonata\ClassificationBundle\SonataClassificationBundle(),
            new Application\Sonata\ClassificationBundle\ApplicationSonataClassificationBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
//            new Ornicar\GravatarBundle\OrnicarGravatarBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new Sonata\NewsBundle\SonataNewsBundle(),
            new Application\Sonata\NewsBundle\ApplicationSonataNewsBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\MarkItUpBundle\SonataMarkItUpBundle(),
             
            new Sonata\TimelineBundle\SonataTimelineBundle(),
            new Spy\TimelineBundle\SpyTimelineBundle(),
            new Application\Sonata\TimelineBundle\ApplicationSonataTimelineBundle(),
            new CoopTilleuls\Bundle\AclSonataAdminExtensionBundle\CoopTilleulsAclSonataAdminExtensionBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),
            new Application\Sonata\NotificationBundle\ApplicationSonataNotificationBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Busshike\ClinicBundle\BusshikeClinicBundle(),
             new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader) {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
