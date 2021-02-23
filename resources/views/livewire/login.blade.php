<main class="site-main outer">
    <center>
        <form wire:submit.prevent="submit">
            @csrf
            <h1>Giriş Yap</h1>
            <div class="form__group field">
                <input type="email" class="form__field" wire:model="email"/>
                    <label for="name" class="form__label">Email</label>
                    @error('email') <p class="alert">{{ $message }}</p> @enderror
                </div>
                <div class="form__group field">
                    <input type="password" class="form__field" style="resize:none;" rows="2" maxlength="200" wire:model="password"/>
                    <label for="name" class="form__label">Şifre</label>
                    @error('password') <p class="alert">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn" >Gönder</button>
            </div>
        </form>
    </center>
</main>
