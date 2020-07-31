<div class='col-lg-12 col-md-12 col-sm-12 allowed_formats pdb-0' style='padding-left:0'>
    <p class="font-size-14 lfont-size-13">
        The total size of the attachments should not exceed 10 MB. Allowed types:
    </p>
    <p class="font-size-14 pdt-15 lfont-size-13">
        jpg, jpeg, png, gif, pdf, doc, docx, ppt, pptx, txt, xls, xlsx, xlxs.
    </p>
    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}
    @if ($errors->has('g-recaptcha-response'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
    @endif
</div>


