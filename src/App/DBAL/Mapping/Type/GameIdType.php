<?php


class GameIdType extends \Doctrine\DBAL\Types\Type
{
    /**
     * @var string
     */
    const NAME = 'quote_id';
    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array $fieldDeclaration The field declaration.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
        return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * @param mixed $value
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
        if(empty($value)) {
            return null;
        }
        if($value instanceof \App\Game\Domain\GameId) {
            return $value;
        }

        try {
            $quoteId = \App\Game\Domain\GameId::fromString($value);
        } catch(\InvalidArgumentException $e) {
            throw \Doctrine\DBAL\Types\ConversionException::conversionFailed($value, self::NAME);
        }

        return $quoteId;
    }

    /**
     * @param mixed $value
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
     * @return null|string
     * @throws \Doctrine\DBAL\Types\ConversionException
     */
    public function convertToDatabaseValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
        if(empty($value)){
            return null;
        }
        if($value instanceof \App\Game\Domain\GameId) {
            return (string) $value;
        }

        throw \Doctrine\DBAL\Types\ConversionException::conversionFailed($value, self::NAME);
    }

    /**
     * Gets the name of this type.
     *
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(\Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
        return true;
    }
}