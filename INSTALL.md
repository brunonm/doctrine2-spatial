# Symfony2 Install

## composer.json
    "require": {
    	...
        "ue/doctrine2-spatial": "dev-master"

You will also have to change the version requirement of doctrine to at least 2.1:

        "doctrine/orm": ">=2.1",


## config.yml
You need to manually add the types and functions you use:

	doctrine:
	    dbal:
	        types:
	            geometry:   Ue\Spatial\DBAL\Types\GeometryType
	    orm:
	        dql:
	            numeric_functions:
	                st_contains:        Ue\Spatial\ORM\Query\AST\Functions\PostgreSql\STContains
	                st_distance:        Ue\Spatial\ORM\Query\AST\Functions\PostgreSql\STDistance
	                st_area:            Ue\Spatial\ORM\Query\AST\Functions\PostgreSql\STArea
	                st_length:          Ue\Spatial\ORM\Query\AST\Functions\PostgreSql\STLength
	                st_geomfromtext:    Ue\Spatial\ORM\Query\AST\Functions\PostgreSql\STGeomFromText