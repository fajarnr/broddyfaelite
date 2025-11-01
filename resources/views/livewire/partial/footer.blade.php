<footer class="footer">
    <div class="container-fluid">
        <div class="footer-content">

            <div class="footer-left">
                <a href="/info">ACCOUNT</a>

                @if(!empty($info->instagram))
                    <a href="{{ $info->instagram }}" target="_blank">INSTAGRAM</a>
                @endif

                @if(!empty($info->youtube))
                    <a href="{{ $info->youtube }}" target="_blank">YOUTUBE</a>
                @endif

                @if(!empty($info->xhs))
                    <a href="{{ $info->xhs }}" target="_blank">小红书</a>
                @endif
            </div>

        </div>
    </div>
</footer>