<?php
namespace mindpowered\electricalc;

use \maglev\MagLev;
use \maglev\MagLevPhp;
use \electricalc\ElectricalCalculator as ElectricalCalculator_Library;

/**
 * Copyright Mind Powered Corporation 2020
 * 
 * https://mindpowered.dev/
 */


/**
 * A library for calculations related to electrical wiring and circuits
 */
class ElectriCalc
{
	/**
	 * ElectriCalc
	 */
	function __construct() {
		$bus = MagLev::getInstance('default');
		$lib = new ElectricalCalculator_Library($bus);
	}

	/**
	 * Convert from Phase Angle to Power Factor
	 * @param float $phaseAngle Phase Angle in degrees
	 * @return float Power Factor
	 */
	public function ConvertPhaseAngleToPowerFactor($phaseAngle)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$phaseAngle];
		$ret = null;
		$phpbus->call('ElectriCalc.ConvertPhaseAngleToPowerFactor', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Convert from Power Factor to Phase Angle
	 * @param float $powerFactor Power Factor
	 * @return float Phase Angle in degrees
	 */
	public function ConvertPowerFactorToPhaseAngle($powerFactor)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$powerFactor];
		$ret = null;
		$phpbus->call('ElectriCalc.ConvertPowerFactorToPhaseAngle', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Calcualte single phase power based on measured voltage and current
	 * @param float $voltage Measured voltage in Volts
	 * @param float $current Measured current in Amps
	 * @return float Apparent Power in VA
	 */
	public function CalculateSinglePhasePower($voltage, $current)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$voltage, $current];
		$ret = null;
		$phpbus->call('ElectriCalc.CalculateSinglePhasePower', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Calcualte three phase power based on measured voltage and current
	 * @param float $voltage Measured voltage in Volts
	 * @param string $lineTo Which voltage was measured. Must be "line" or "netural"
	 * @param float $current Measured current in Amps
	 * @return float Apparent Power in VA
	 */
	public function CalculateThreePhasePower($voltage, $lineTo, $current)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$voltage, $lineTo, $current];
		$ret = null;
		$phpbus->call('ElectriCalc.CalculateThreePhasePower', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

}
