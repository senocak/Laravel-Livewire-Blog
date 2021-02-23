<main class="outer">
    @if (session()->has('message'))
        <p class="alert">{{ session('message') }}</p>
    @endif
    <div class="post-feed">
        <div style="width: 100%;">
            <div style="width: 10%; float: right">
                <div class="form__group field">
                    <select class="form__field" wire:model="limit">
                        <option value="" disabled selected style="background: black;">Kayıt Göster</option>
                        <option value="10" style="background: black;">10</option>
                        <option value="20" style="background: black;">20</option>
                        <option value="50" style="background: black;">50</option>
                    </select>
                </div>
            </div>
            <div style="width: 20%; float: right">
                <div class="form__group field">
                    <input type="text" class="form__field" wire:model="ara"/>
                    <label for="baslik" class="form__label">Yorum Ara</label>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Yazı</th>
                    <th>Yorum</th>
                    <th>İşlemler</th>
                </tr>
            <thead>
                <tbody>
                    @forelse ($yorumlar as $item)
                        <tr>
                            <td>#</td>
                            <td @if($item->onay == 0) style="text-decoration: line-through"@endif>{{$item->email}}</td>
                            <td><a href="/yazi/{{$item->yazi->url}}#yorum_{{$item->id}}" class="btn-1" style="text-decoration: none">{{$item->yazi->baslik}}</a></td>
                            <td>{{ \Illuminate\Support\Str::limit($item->yorum, 100, '...') }}</td>
                            <td>
                                <a wire:click="gizle({{$item->id}})" title="Sil" onclick="return confirm('Emin Misiniz?!')" style="color: white">
                                    @if($item->onay == 0)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>#</td>
                            <td>Kayıt Yok</td>
                            <td>Kayıt Yok</td>
                            <td>Kayıt Yok</td>
                            <td>#</td>
                        </tr>
                    @endforelse
                </tbody>
            </thead>
        </table>
        <div class="pagination">
            <ul>
                {{ $yorumlar->links("pagination-links") }}
            </ul>
        </div>
    </div>
</main>
