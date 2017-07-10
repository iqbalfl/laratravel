<!DOCTYPE html>
<html lang="id">
<head>
    <title>Invoice</title>
</head>
<body style="font-family: open sans, tahoma, sans-serif; margin: 0; -webkit-print-color-adjust: exact">
    <table width="790" cellspacing="0" cellpadding="0" class="container" style="width: 790px; padding: 20px;">
        <tr>
            <td>
                <table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; padding-bottom: 20px;">
                    <tbody>
                        <tr style="margin-top: 8px; margin-bottom: 8px;">
                            <td>
                                <img src="{{ asset('/img/logo.png') }}" alt="LaraTravel">
                            </td>
                            <td style="text-align: right; padding-right: 15px;">
                                <a style="color: #42B549; font-size: 14px; text-decoration: none;" href="javascript:window.print()">
                                    <span style="vertical-align: middle">Cetak</span>
                                    <img src="{{ asset('/img/print.png') }}" alt="Print" style="vertical-align: middle;">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; padding-bottom: 20px;">
                    <tbody>
                        <tr style="font-size: 20px; font-weight: 600;">
                            <td style="padding-bottom: 5px;">
                                <span>Invoice</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 10px;">
                                <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 90px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Nama</td>
                                                        <td style="padding: 3px 0;">{{$transaction->user->name}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 90px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">ID Transaksi</td>
                                                        <td style="padding: 3px 0;">{{$transaction->id}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 90px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Tanggal</td>
                                                        <td style="padding: 3px 0;">{{$ldate = date('Y-m-d')}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 10px;vertical-align: text-top;">
                                <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 80px;vertical-align: text-top; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Pembayaran</td>
                                                        <td>
                                                            <div style="padding-bottom: 3px;">{{$transaction->confirmation->payment_method}} {{$transaction->confirmation->info}} &nbsp;
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; text-align: center; border-top: 1px solid #F1F1F2; border-bottom: 1px solid #F1F1F2; padding: 15px 0;" width="100%" cellspacing="0" cellpadding="0">
                    <thead style="font-size: 14px;">
                        <tr>
                            <th style="font-weight: 600; text-align: left; padding: 0 5px 15px 15px;">Tempat Tujuan</th>
                            <th style="width: 120px; font-weight: 600; padding: 0 5px 15px;" width="120">Mobil</th>
                            <th style="width: 115px; font-weight: 600; padding: 0 5px 15px;" width="115">Jumlah Orang</th>
                            <th style="width: 65px; font-weight: 600; padding: 0 5px 15px;" width="65">Status</th>
                            <th style="width: 115px; font-weight: 600; text-align: right; padding: 0 30px 15px 5px;" width="115">Tgl. Pergi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size: 13px;">
                            <td style="text-align: left; padding: 8px 5px 8px 15px;">{{$transaction->place->name}}</td>
                            <td style="width: 120px; padding: 8px 5px;" width="120">{{$transaction->car->name}}</td>
                            <td style="width: 65px; padding: 8px 5px;" width="65">{{$transaction->total_participants}}</td>
                            <td style="width: 115px; padding: 8px 5px;" width="115">{{$transaction->confirmation->status}}</td>
                            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115">{{$transaction->start_date}}</td>
                        </tr>
                        <tr style="font-size: 13px; background-color: #F1F1F1;" bgcolor="#F1F1F1">
                            <td style="font-weight: 600; text-align: left; padding: 8px 5px 8px 15px;">Rp {{$transaction->place->cost}}</td>
                            <td style="font-weight: 600; padding: 8px 5px;" width="65">Rp {{$transaction->car->cost}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; text-align: center; padding: 15px 0;" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="font-size: 13px; background-color: #F1F1F1;" bgcolor="#F1F1F1">
                            <td style="font-weight: 600; text-align: left; padding: 8px 0 8px 15px;">Rincian</td>
                            <td style="width: 120px; padding: 8px 5px;" width="120"></td>
                            <td style="width: 65px; padding: 8px 5px;" width="65"></td>
                            <td style="width: 115px; font-weight: 600; text-align: left; padding: 8px 5px;" width="115">Tempat Tujuan</td>
                            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115">Rp {{$transaction->place->cost}}</td>
                        </tr>
                        <tr style="font-size: 13px;">
                        </tr>
                        <tr style="font-size: 13px; background-color: #F1F1F1;" bgcolor="#F1F1F1">
                            <td style="font-weight: 600; text-align: left; padding: 8px 0 8px 15px;"></td>
                            <td style="width: 120px; padding: 8px 5px;" width="120"></td>
                            <td style="width: 65px; padding: 8px 5px;" width="65"></td>
                            <td style="width: 115px; font-weight: 600; text-align: left; padding: 8px 5px;" width="115">Sewa Mobil</td>
                            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115">Rp {{$transaction->car->cost}}</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; padding: 0 0 20px;">
                    <tbody>
                        <tr>
                            <td width="35%" valign="top" style="width: 35%; vertical-align: top; padding-right: 5px;"></td>
                            <td width="65%" valign="top" style="width: 65%; vertical-align: top; padding-left: 5px;">
                                <table width="100%" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse;">
                                    <tr bgcolor="#F1F1F1" style="font-size: 15px; color: #42B549; background-color: #F1F1F1;">
                                        <td style="padding: 15px 0 15px 30px; font-weight: 600;">Total</td>
                                        <td style="padding: 15px 30px 15px 0; font-weight: 600; text-align: right; ">{{$transaction->total_cost}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%" valign="top" style="width: 35%; vertical-align: top; padding-right: 5px;"></td>
                            <td width="65%" valign="top" style="width: 65%; vertical-align: top; padding-left: 5px;">
                                <table width="100%" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse;">
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
