<?php
class Cos {
	private static $error = 0.0000000000001;
	private $cos;
	private $log = '';

	public function __construct($cos) {
		$this->cos = $cos;
	}

	public function toDegree() {
		$degree = null;
		if (is_numeric($this->cos)) {
			if ($this->cos >= -1 && $this->cos <= 1) {
				switch ($this->cos) {
					case 1:
						$degree = 0;
						break;
					case 0:
						$degree = 90;
						break;
					case -1:
						$degree = 180;
						break;
					default:
						if ($this->cos > 0) {
							$degree = 45;
						} else {
							$degree = 135;
						}
						$degree = $this->toDegreeCore($this->cos, $degree, 1);
						break;
				}
			}
		}
		return $degree;
	}

	private function toDegreeCore($cos, $degree, $step) {
		$this->log.= 'degree='.$degree.", step=".$step.PHP_EOL;
		$deg2cos = cos(deg2rad($degree));
		$dif = $cos - $deg2cos;
		if (abs($dif) > self::$error) {
			$difdig = 45 / pow(2, $step);
			if ($difdig > self::$error) {
				if ($dif > 0) {
					$degree = $degree - $difdig;
				} else if ($dif < 0) {
					$degree = $degree + $difdig;
				}
				$degree = $this->toDegreeCore($cos, $degree, $step + 1);
			}
		}
		return $degree;
	}

	public function getLog() {
		return $this->log;
	}
}