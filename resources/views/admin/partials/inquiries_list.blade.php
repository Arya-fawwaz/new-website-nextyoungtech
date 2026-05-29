@if(empty($inquiries) || count($inquiries) === 0)
    <div style="text-align: center; padding: 60px 0; color: var(--text-muted); background: var(--bg-body); border-radius: 16px; border: 2px dashed var(--border-color);">
        <i class="fa-solid fa-envelope-open" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
        <p style="font-size: 15px; font-weight: 600;">Tidak ada pertanyaan dari klien.</p>
    </div>
@else
    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Isi Pesan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inq)
                    <tr data-inquiry-id="{{ $inq->id }}">
                        <td>
                            <strong style="font-size: 15px;">{{ $inq->nama }}</strong><br>
                            <span style="font-size: 13px; color: var(--text-muted); display: block; margin-bottom: 4px;">{{ $inq->email }}</span>
                            @if($inq->telepon)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->telepon) }}" target="_blank" style="color: var(--success); text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; padding: 4px 8px; background: rgba(16, 185, 129, 0.1); border-radius: 6px; font-size: 12px; transition: 0.2s;" onmouseover="this.style.background='rgba(16, 185, 129, 0.2)'" onmouseout="this.style.background='rgba(16, 185, 129, 0.1)'">
                                    <i class="fa-brands fa-whatsapp" style="font-size: 14px;"></i> {{ $inq->telepon }}
                                </a>
                            @else
                                <span style="font-size: 11px; color: var(--text-muted); font-style: italic;">Tidak ada telepon</span>
                            @endif
                        </td>
                        <td><strong style="color: var(--text-main);">{{ $inq->subjek }}</strong></td>
                        <td style="max-width: 350px; font-size: 14px; line-height: 1.6; color: var(--text-muted);">{{ $inq->pesan }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                <form action="{{ route('admin.inquiry.status', $inq->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-control-glass" style="margin: 0; padding: 8px 12px; width: auto; font-weight: 700; cursor: pointer;" onchange="this.form.submit()">
                                        <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>Baru</option>
                                        <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                                        <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                                @if($inq->telepon)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->telepon) }}?text={{ urlencode('Halo ' . $inq->nama . ', terima kasih telah menghubungi Next Young Tech. Kami telah menerima pesan Anda mengenai "' . $inq->subjek . '".') }}" target="_blank" style="background: #25d366; color: #fff; padding: 8px 14px; border-radius: 8px; font-weight: 700; font-size: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; white-space: nowrap; transition: 0.2s; box-shadow: 0 2px 8px rgba(37, 211, 102, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(37, 211, 102, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(37, 211, 102, 0.3)'">
                                        <i class="fa-brands fa-whatsapp" style="font-size: 14px;"></i> Balas WA
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
