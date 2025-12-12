<?php
namespace App\Services;

class SawService
{
    public function normalize($data)
    {
        $maxValues = [];

        foreach ($data as $karyawan => $item)
            foreach ($item['nilai'] as $kid => $val)
                $maxValues[$kid] = max($maxValues[$kid] ?? 0, $val);

        $normalized = [];

        foreach ($data as $karyawan => $item) {
            foreach ($item['nilai'] as $kid => $val) {
                $normalized[$karyawan]['nil_norm'][$kid] = $maxValues[$kid] ? $val / $maxValues[$kid] : 0;
            }
        }

        return $normalized;
    }

    public function calculateFinalScore($normalized, $bobot)
    {
        $scores = [];

        foreach ($normalized as $karyawan => $item) {
            $total = 0;
            foreach ($item['nil_norm'] as $kid => $val) {
                $total += $val * $bobot[$kid];
            }
            $scores[$karyawan] = $total;
        }

        arsort($scores);
        return $scores;
    }
}

