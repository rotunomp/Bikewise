<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * OrderQuantityUnit Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class OrderQuantityUnit implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'measurement_unit' => '\SquareConnect\Model\MeasurementUnit',
        'precision' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'measurement_unit' => 'measurement_unit',
        'precision' => 'precision'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'measurement_unit' => 'setMeasurementUnit',
        'precision' => 'setPrecision'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'measurement_unit' => 'getMeasurementUnit',
        'precision' => 'getPrecision'
    );
  
    /**
      * $measurement_unit A [MeasurementUnit](#type-measurementunit) that represents the unit of measure for the quantity.
      * @var \SquareConnect\Model\MeasurementUnit
      */
    protected $measurement_unit;
    /**
      * $precision For non-integer quantities, represents the number of digits after the decimal point that are recorded for this quantity.  For example, a precision of 1 allows quantities like `\"1.0\"` and `\"1.1\"`, but not `\"1.01\"`.  Min: 0. Max: 5.  Orders Hub and older versions of Connect do not support non-integer quantities. See [Decimal quantities with Orders hub and older versions of Connect](/more-apis/orders/overview#decimal-quantities).
      * @var int
      */
    protected $precision;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["measurement_unit"])) {
              $this->measurement_unit = $data["measurement_unit"];
            } else {
              $this->measurement_unit = null;
            }
            if (isset($data["precision"])) {
              $this->precision = $data["precision"];
            } else {
              $this->precision = null;
            }
        }
    }
    /**
     * Gets measurement_unit
     * @return \SquareConnect\Model\MeasurementUnit
     */
    public function getMeasurementUnit()
    {
        return $this->measurement_unit;
    }
  
    /**
     * Sets measurement_unit
     * @param \SquareConnect\Model\MeasurementUnit $measurement_unit A [MeasurementUnit](#type-measurementunit) that represents the unit of measure for the quantity.
     * @return $this
     */
    public function setMeasurementUnit($measurement_unit)
    {
        $this->measurement_unit = $measurement_unit;
        return $this;
    }
    /**
     * Gets precision
     * @return int
     */
    public function getPrecision()
    {
        return $this->precision;
    }
  
    /**
     * Sets precision
     * @param int $precision For non-integer quantities, represents the number of digits after the decimal point that are recorded for this quantity.  For example, a precision of 1 allows quantities like `\"1.0\"` and `\"1.1\"`, but not `\"1.01\"`.  Min: 0. Max: 5.  Orders Hub and older versions of Connect do not support non-integer quantities. See [Decimal quantities with Orders hub and older versions of Connect](/more-apis/orders/overview#decimal-quantities).
     * @return $this
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
