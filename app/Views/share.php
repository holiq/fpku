
            <div class="share">
              <input class="share-input" type="checkbox" id="checkbox">
              <label class="share-toggler" for="checkbox">
                <span class="share-icon"></span>
              </label>

              <ul class="share_options" data-title="Share">
              <li><a href="https://www.facebook.com/sharer.php?u=<?= current_url(true); ?>">Facebook</a></li>
              <li><a href="https://twitter.com/intent/tweet?url=<?= current_url(true); ?>l&amp;text=<?= $d->posting_judul; ?>">Twitter</a></li>
              <li><a href="#">Google</a></li>
              <li><a href="#">Email</a></li>
            </ul>
          </div>