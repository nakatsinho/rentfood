<div class="form-group row">
                                <label for="hummm" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="hummm" type="text" class="form-control @error('hummm') is-invalid @enderror" name="hummm" value="{{ old('hummm') }}" required autocomplete="hummm" autofocus>
                                    @error('hummm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>