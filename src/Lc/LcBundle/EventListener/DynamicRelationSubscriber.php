<?php
// src/Acme/DemoBundle/EventListener/DynamicRelationSubscriber.php
class DynamicRelationSubscriber implements EventSubscriber
{
    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();

        if ($metadata->getName() != 'Acme\DemoBundle\Entity\BlogArticle') {
            return;
        }

        $namingStrategy = $eventArgs
            ->getEntityManager()
            ->getConfiguration()
            ->getNamingStrategy()
        ;

        $metadata->mapManyToMany(array(
            'targetEntity'  => UploadedDocument::CLASS,
            'fieldName'     => 'uploadedDocuments',
            'cascade'       => array('persist'),
            'joinTable'     => array(
                'name'        => strtolower($namingStrategy->classToTableName($metadata->getName())) . '_document',
                'joinColumns' => array(
                    array(
                        'name'                  => $namingStrategy->joinKeyColumnName($metadata->getName()),
                        'referencedColumnName'  => $namingStrategy->referenceColumnName(),
                        'onDelete'  => 'CASCADE',
                        'onUpdate'  => 'CASCADE',
                    ),
                ),
                'inverseJoinColumns'    => array(
                    array(
                        'name'                  => 'document_id',
                        'referencedColumnName'  => $namingStrategy->referenceColumnName(),
                        'onDelete'  => 'CASCADE',
                        'onUpdate'  => 'CASCADE',
                    ),
                )
            )
        ));
    }
}
