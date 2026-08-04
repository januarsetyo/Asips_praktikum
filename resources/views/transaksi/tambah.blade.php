<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4" style="max-width:900px">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Transaksi Penjualan</h5>
        </div>
        <div class="card-body">

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="/transaksi-form" id="formTransaksi">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">No Transaksi</label>
                        <input type="text" name="no_transaksi" class="form-control"
                            value="{{ $noTransaksi }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer <span class="text-danger">*</span></label>
                    <input type="text" name="customer" class="form-control @error('customer') is-invalid @enderror"
                        value="{{ old('customer') }}" placeholder="Nama customer">
                    @error('customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">Item Barang</h6>
                    <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">+ Tambah Baris</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelItem">
                        <thead class="table-light">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="width:90px">Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th style="width:60px">#</th>
                            </tr>
                        </thead>
                        <tbody id="bodyItem">
                            <!-- baris pertama otomatis -->
                        </tbody>
                    </table>
                </div>

                <div class="text-end mb-3">
                    <strong>Total: Rp <span id="totalDisplay">0</span></strong>
                </div>

                <div class="d-flex gap-2">
                    <a href="/transaksi" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
// Data barang dari server, di-index berdasarkan kode_barang
const barangData = @json($barang->keyBy('kode_barang'));
let rowIndex = 0;

function tambahBaris() {
    const tbody = document.getElementById('bodyItem');
    const options = Object.values(barangData).map(b =>
        `<option value="${b.kode_barang}">${b.kode_barang} - ${b.nama_barang}</option>`
    ).join('');

    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td>
            <select name="items[${rowIndex}][kode_barang]" class="form-select form-select-sm"
                onchange="onKodeChange(this, ${rowIndex})" required>
                <option value="">-- Pilih --</option>
                ${options}
            </select>
        </td>
        <td>
            <input type="text" name="items[${rowIndex}][nama_barang]" id="nama_${rowIndex}"
                class="form-control form-control-sm" readonly>
        </td>
        <td>
            <input type="number" name="items[${rowIndex}][qty]" id="qty_${rowIndex}"
                class="form-control form-control-sm" min="1" value="1"
                oninput="hitungSubtotal(${rowIndex})" required>
        </td>
        <td>
            <input type="number" name="items[${rowIndex}][harga]" id="harga_${rowIndex}"
                class="form-control form-control-sm" readonly>
        </td>
        <td>
            <input type="number" name="items[${rowIndex}][sub_total]" id="subtotal_${rowIndex}"
                class="form-control form-control-sm" readonly>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">X</button>
        </td>
    `;
    tbody.appendChild(tr);
    rowIndex++;
}

function onKodeChange(select, idx) {
    const kode = select.value;
    if (!kode) return;

    const barang = barangData[kode];
    if (barang) {
        document.getElementById('nama_' + idx).value  = barang.nama_barang;
        document.getElementById('harga_' + idx).value = barang.harga;
        hitungSubtotal(idx);
    }
}

function hitungSubtotal(idx) {
    const qty   = parseFloat(document.getElementById('qty_' + idx).value)   || 0;
    const harga = parseFloat(document.getElementById('harga_' + idx).value) || 0;
    document.getElementById('subtotal_' + idx).value = qty * harga;
    hitungTotal();
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('[id^="subtotal_"]').forEach(el => {
        total += parseFloat(el.value) || 0;
    });
    document.getElementById('totalDisplay').textContent = total.toLocaleString('id-ID');
}

function hapusBaris(btn) {
    btn.closest('tr').remove();
    hitungTotal();
}

// Mulai dengan 1 baris kosong
tambahBaris();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
