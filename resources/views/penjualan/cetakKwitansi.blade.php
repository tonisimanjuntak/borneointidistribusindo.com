<style>
    body {
        margin: 0;
        padding: 0;
    }

    table {
        margin: 0;
        padding: 0;
        border-collapse: collapse;
    }

    td,
    th {
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .fs-8 {
        font-size: 8px;
    }

    .fs-9 {
        font-size: 9px;
    }

    .fs-10 {
        font-size: 10px;
    }

    .fs-11 {
        font-size: 11px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-13 {
        font-size: 13px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-15 {
        font-size: 15px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .fs-17 {
        font-size: 17px;
    }

    .fs-18 {
        font-size: 18px;
    }

    .mt-1 {
        margin-top: 10px;
    }

    .mt-2 {
        margin-top: 20px;
    }

    .mt-3 {
        margin-top: 30px;
    }

    .mt-4 {
        margin-top: 40px;
    }

    .mt-5 {
        margin-top: 50px;
    }

    .font-weight-bold {
        font-weight: bold;
    }
</style>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td width="35%">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="fs-10 font-weight-bold">{{ session()->get('usaha_nama') }}</td>
                </tr>
                <tr>
                    <td class="fs-8">{{ session()->get('usaha_alamat') }} No Telepon. {{
                        session()->get('usaha_telepon')}}
                    </td>
                </tr>
            </table>
        </td>
        <td width="35%" align="center">
            <span class="fs-16 font-weight-bold">K W I T A N S I</span><br>
            <span class="fs-12 font-weight-bold">No. {{ $rowKwitansi->nokwitansi }}</span>
        </td>
        <td width="30%">
            <table width="100%" cellpadding="0">
                <tr>
                    <td width="25%">Tanggal</td>
                    <td width="5%">:</td>
                    <td width="70%">{{ tglindonesia($rowKwitansi->tglkwitansi) }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $rowPenjualan->namakonsumen }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<table class="detail-barang" border="1" cellpadding="3" cellspacing="0" width="100%">
    <thead>
        <tr class="fs-10 font-weight-bold">
            <th width="7%" style="text-align:center;">NO</th>
            <th width="38%" style="text-align:center;">Nama Barang</th>
            <th width="10%" style="text-align:center;">Qty</th>
            <th width="15%" style="text-align:center;">Harga Satuan</th>
            <th width="15%" style="text-align:center;">Discount</th>
            <th width="15%" style="text-align:center;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($rsDetail as $row)
        <tr class="fs-12">
            <td width="7%" style="text-align: center;">{{ $no++ }}</td>
            <td width="38%" style="text-align: left;">{{ $row->namabarang }}</td>
            <td width="10%" style="text-align: center;">{{ $row->jumlahjual }}</td>
            <td width="15%" style="text-align: right;">{{ format_rupiah($row->hargasatuan) }}</td>
            <td width="15%" style="text-align: right;">{{ format_rupiah($row->jumlahdiskon) }}</td>
            <td width="15%" style="text-align: right;">{{ format_rupiah($row->subtotaljual) }}</td>
        </tr>
        @endforeach

        @if ($no < 3) {{-- Loop Detail --}} @for ($i=$no; $i <=3; $i++) <tr class="fs-10">
            <td style="text-align: center;">&nbsp;</td>
            <td style="text-align: left;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            </tr>
            @endfor
            @endif

            <tr class="fs-10">
                <td style="text-align: left;" colspan="3" rowspan="10">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="30%" style="text-align: left;">Total Hutang</td>
                                <td width="5%" style="text-align: left;">:</td>
                                <td width="30%" style="text-align: right;">{{
                                    format_rupiah($rowPenjualan->totalinvoice) }}</td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: left;">Total Angsuran</td>
                                <td width="5%" style="text-align: left;">:</td>
                                <td width="30%" style="text-align: right;">{{
                                    format_rupiah($rowKwitansi->jumlahsudahbayar + $rowKwitansi->jumlahbayar) }}</td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: left;">Sisa Hutang</td>
                                <td width="5%" style="text-align: left;">:</td>
                                <td width="30%" style="text-align: right;">{{
                                    format_rupiah($rowPenjualan->totalinvoice - $rowKwitansi->jumlahsudahbayar -
                                    $rowKwitansi->jumlahbayar) }}</td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: left;">Jatuh Tempo</td>
                                <td width="5%" style="text-align: left;">:</td>
                                <td width="30%" style="text-align: left;">{{ $tgljatuhtempo }}</td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: left;"></td>
                                <td width="5%" style="text-align: left;"></td>
                                <td width="30%" style="text-align: right;"></td>
                                <td width="35%"></td>
                            </tr>
                            <tr>
                                <td width="100%" style="text-align: left;" colspan="4"><strong>Terbilang:</strong> {{
                                    terbilang($rowKwitansi->jumlahsudahbayar + $rowKwitansi->jumlahbayar) }} rupiah</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="text-align: right; font-weight: bold;" colspan="2">JUMLAH</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totaldpp + $rowPenjualan->totalppn + $rowPenjualan->totaldiskon +
                    $rowPenjualan->totalpotongancarabayar + $rowPenjualan->totalpotonganpengiriman) }}</td>
            </tr>

            <tr class="fs-10 font-weight-bold">
                <td style="text-align: right; font-weight: bold;" colspan="2">DISCOUNT</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totaldiskon) }}</td>
            </tr>
            <tr class="fs-10 font-weight-bold">
                <td style="text-align: right; font-weight: bold;" colspan="2">POTONGAN</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totalpotongancarabayar + $rowPenjualan->totalpotonganpengiriman) }}
                </td>
            </tr>
            <tr class="fs-10 font-weight-bold">
                <td style="text-align: right; font-weight: bold;" colspan="2">JUMLAH DPP</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totaldpp) }}</td>
            </tr>
            <tr class="fs-10 font-weight-bold">
                <td style="text-align: right; font-weight: bold;" colspan="2">PPN
                    ({{$rowPenjualan->ppnpersen}}%)</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totalppn) }}</td>
            </tr>
            <tr class="fs-10 font-weight-bold">
                <td style="text-align: right; font-weight: bold;" colspan="2">TOTAL KWITANSI</td>
                <td style="text-align: right; font-weight: bold;">{{
                    format_rupiah($rowPenjualan->totalinvoice) }}</td>
            </tr>
    </tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

    <!-- Detail Barang -->
    <tr>
        <td colspan="3">

        </td>
    </tr>

    <!-- Tanda Tangan -->
    <tr>
        <td colspan="3">
            <table border="0" cellpadding="5" cellspacing="0" width="100%">
                <tr>
                    <td width="75%"></td>
                    <td width="25%" align="center">
                        Hormat Kami<br><br><br><br>
                        @php
                        echo '(' . str_repeat('&nbsp;', 30) . ')';
                        @endphp
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>