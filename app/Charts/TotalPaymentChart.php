<?php

namespace App\Charts;

use DateTime;
use App\Models\Payment;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalPaymentChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $startDate = date('Y-m-d', strtotime('-6 days'));
        $endDate = date('Y-m-d');

        $dates = [];
        $currentDate = new DateTime($startDate);

        while ($currentDate->format('Y-m-d') <= $endDate) {
            $dates[] = $currentDate->format('Y-m-d');
            $currentDate->modify('+1 day');
        }

        $dataPayment = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();

        $paymentDataPerDay = [];

        // Inisialisasi nilai awal untuk setiap tanggal
        foreach ($dates as $date) {
            $paymentDataPerDay[] = 0;
        }

        // Menghitung jumlah data untuk setiap tanggal
        foreach ($dataPayment as $payment) {
            $paymentDate = date('Y-m-d', strtotime($payment->date_payment));
            $index = array_search($paymentDate, $dates);

            if ($index !== false) {
                $paymentDataPerDay[$index]++;
            }
        }

        $subtitleDate = "$startDate to $endDate";

        return $this->chart->areaChart()
            ->setTitle('Sales during 6 days ago')
            ->setSubtitle($subtitleDate)
            ->addData('Total sales', $paymentDataPerDay)
            ->setFontFamily('Poppins')
            ->setXAxis($dates);
    }
}
