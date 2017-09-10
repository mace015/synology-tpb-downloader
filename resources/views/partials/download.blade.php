<div class="modal" :class="{ 'is-active': download_modal_open }">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Start a new download</p>
            <button class="delete" aria-label="close" @click="closeDownloadModal"></button>
        </header>
        <section class="modal-card-body">
            <label class="label">Search</label>
            <p class="control has-addons">
                <input class="input is-expanded" name="search" value="" autocomplete="off" v-model="query" @keyup.enter="search()" />

                <button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': is_loading_results }" @click="search()">
                    <span class="icon is-small"> <i class="fa fa-search"></i> </span>
                    <span> Search </span>
                </button>
            </p>

            <div class="table-container">
                <table class="table is-bordered is-striped">
                    <thead>
                        <th> <span class="icon is-small"> <i class="fa fa-download"></i> </span> </th>
                        <th> Name </th>
                        <th> Seeders </th>
                    </thead>
                    <tbody>
                        <tr v-show="is_loading_results">
                            <td colspan="4"> <strong> Scraping TPB for results, one moment please... </strong> </td>
                        </tr>
                        <tr v-show="results.length == 0 && !is_loading_results">
                            <td colspan="4"> No results found! </td>
                        </tr>
                        <tr v-show="!is_loading_results" v-for="result in results">
                            <td>
                                <button type="submit" class="button is-primary is-pulled-right" @click="startDownload(result.magnet, $event)">
                                    <span class="icon is-small"> <i class="fa fa-download"></i> </span>
                                </button>
                            </td>
                            <td> @{{ result.name }} </td>
                            <td> @{{ result.seeders }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-pulled-right" @click="closeDownloadModal">Close</button>
        </footer>
    </div>
</div>