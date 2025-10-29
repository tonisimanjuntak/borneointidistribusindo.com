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
        <td width="35%" class="fs-10">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="font-weight-bold">{{ session()->get('usaha_nama') }}</td>
                </tr>
                <tr>
                    <td>{{ session()->get('usaha_alamat') }} No Telepon. {{ session()->get('usaha_telepon')}}
                    </td>
                </tr>
            </table>
        </td>
        <td width="35%" align="center">
            <span class="fs-16 font-weight-bold">SURAT JALAN</span><br>
            <span class="fs-12 font-weight-bold">No. {{ $rowSuratJalan->idsuratjalan }}</span>
        </td>
        <td width="30%">
            <table width="100%" cellpadding="0">
                <tr>
                    <td width="35%">Tgl. Kirim</td>
                    <td width="5%">:</td>
                    <td width="60%">{{ tglindonesia($rowSuratJalan->tglsuratjalan) }}</td>
                </tr>
                <tr>
                    <td>No. Invoice</td>
                    <td>:</td>
                    <td>{{ $rowSuratJalan->daftarnoinvoice }}</td>
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

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <!-- Informasi Konsumen -->
        <tr>
            <td width="15%">Kepada:</td>
            <td width="5%" style="text-align: center;">:</td>
            <td width="80%">{{ $rowSuratJalan->namakonsumen }}
            </td>
        </tr>
        <tr>
            <td style="width: 15%;">Alamat</td>
            <td style="width: 5%; text-align: center;">:</td>
            <td style="width: 80%;">{{ $rowKonsumen->alamatkonsumen }}</td>
        </tr>
        <tr>
            <td style="width: 15%;">No. Telp/ Email</td>
            <td style="width: 5%; text-align: center;">:</td>
            <td style="width: 80%;">{{ $rowKonsumen->notelpkonsumen . ' / ' .
                $rowKonsumen->emailkonsumen }}</td>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<table border="1" cellpadding="3" cellspacing="0" width="100%">
    <thead>
        <tr class="fs-10 font-weight-bold">
            <th width="10%" style="text-align:center;">NO</th>
            <th width="20%" style="text-align:center;">Jumlah</th>
            <th width="70%" style="text-align:center;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($rsDetail as $row)
        <tr class="fs-11">
            <td width="10%" style="text-align: center;">{{ $no++ }}</td>
            <td width="20%" style="text-align: center;">{{ $row->jumlahjual }}</td>
            <td width="70%" style="text-align: left;">{{ $row->namabarang }}</td>
        </tr>
        @endforeach

        @if ($no < 6) @for ($i=$no; $i <=6; $i++) <tr class="fs-10">
            <td width="10%" style="text-align: center;"></td>
            <td width="20%" style="text-align: center;"></td>
            <td width="70%" style="text-align: left;"></td>
            </tr>
            @endfor
            @endif
    </tbody>
</table>

<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>


<!-- Tanda Tangan -->
<table border="0" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td width="25%" align="center">
            Diterima oleh<br><br><br><br>
            @php
            echo '(' . str_repeat('&nbsp;', 30) . ')';
            @endphp
        </td>
        <td width="25%" align="center">
            Driver/Supir<br><br><br><br>
            @php
            echo '(' . str_repeat('&nbsp;', 30) . ')';
            @endphp
        </td>
        <td width="25%" align="center">
            Gudang<br><br><br><br>
            @php
            echo '(' . str_repeat('&nbsp;', 30) . ')';
            @endphp
        </td>
        <td width="25%" align="center">
            Hormat Kami<br><br><br><br>
            @php
            echo '(' . str_repeat('&nbsp;', 30) . ')';
            @endphp
        </td>
    </tr>
</table>