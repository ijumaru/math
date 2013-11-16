<?php
class Cos {
	private static $error = 0.0001;
	private $cos;
	private $log = '';
	public function __construct($cos) {
		$this->cos = $cos;
	}

	public function toDegree() {
		if (!is_nan($this->cos)) {
			if ($this->cos >= 0 && $this->cos <= 1) {
				switch ($this->cos) {
					case 1:
						$degree = 0;
						break;
					case 0:
						$degree = 90;
						break;
					default:
						$degree = 45;
						$degree = $this->calculate($this->cos, $degree, 1);
						break;
				}
			}
		}
		return $degree;
	}

	private function calculate($cos, $degree, $step) {
		$this->log.= 'degree='.$degree.", step=".$step."<br>";
		$deg2cos = cos(deg2rad($degree));
		$dif = $cos - $deg2cos;
		if (abs($dif) > self::$error) {
			$difdig = 45 / pow(2, $step);
			if ($difdig > self::$error) {
				if ($dif > 0) {
					$degree = $degree - $difdig;
					$degree = $this->calculate($cos, $degree, $step + 1);
				} else if ($dif < 0) {
					$degree = $degree + $difdig;
					$degree = $this->calculate($cos, $degree, $step + 1);
				}
			}
		}
		return $degree;
	}

	public function getLog() {
		return $this->log;
	}
}