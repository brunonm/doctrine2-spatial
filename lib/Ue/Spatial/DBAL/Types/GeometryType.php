<?php

namespace Ue\Spatial\DBAL\Types;

use Doctrine\DBAL\Types\Type,
    Doctrine\DBAL\Types\ConversionException,
    Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class for database column "geometry".
 *
 */
class GeometryType extends Type {
    const GEOMETRY = 'geometry';
    const SRID = 4326;

    /**
     *
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return 'geometry';
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::convertToPHPValue()
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        return $value;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::convertToDatabaseValue()
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        return $value;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::getName()
     */
    public function getName() {
        return self::GEOMETRY;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::canRequireSQLConversion()
     */
    public function canRequireSQLConversion() {
        return true;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::convertToPHPValueSQL()
     */
    public function convertToPHPValueSQL($sqlExpr, $platform) {
        return 'ST_AsText('.$sqlExpr.') ';
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\DBAL\Types\Type::convertToDatabaseValueSQL()
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform) {
        return 'ST_GeomFromText('.$sqlExpr.', '.self::SRID.')';
    }
}