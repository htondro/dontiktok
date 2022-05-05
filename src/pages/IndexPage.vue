<template>
  <q-page class="row items-center justify-center">
    <div class="col q-pa-md q-gutter-sm">
      <div class="row items-center justify-center">
        <div class="col col-md-6 col-xs-12 q-pa-md q-gutter-sm">
          <h1 class="fit">TikTok Video Downloader</h1>
        </div>
      </div>
      <div class="row items-center justify-center" v-if="!dataLoaded">
        <div class="col col-md-5 col-xs-12 q-pa-md q-gutter-sm">
          <transition
            appear
            enter-active-class="animated fadeInLeft"
            leave-active-class="animated fadeOutLeft"
          >
            <q-input
              square
              color="accent"
              v-model.trim="url"
              type="text"
              :disable="gettingUrlData"
              :label="$t('url')"
            >
              <template v-slot:append>
                <q-btn
                  @click="paste"
                  flat
                  dense
                  size="sm"
                  label="Paste"
                  icon="assignment"
                  color="dark"
                >
                </q-btn>
              </template>
            </q-input>
          </transition>
        </div>
        <div class="col col-md-2 col-xs-12 q-pa-md q-gutter-sm">
          <transition
            appear
            enter-active-class="animated fadeInRight"
            leave-active-class="animated fadeOutRight"
          >
            <q-btn
              @click="getUrlData"
              class="full-width"
              color="accent"
              icon="search"
              :label="$t('checkUrl')"
              :loading="gettingUrlData"
            />
          </transition>
        </div>
      </div>
      <div class="row items-center justify-center" v-if="dataLoaded">
        <div class="col col-md-3 col-xs-12 q-pa-md q-gutter-sm">
          <transition
            appear
            enter-active-class="animated fadeInUpBig"
            leave-active-class="animated fadeOutUpBig"
          >
            <q-card class="my-card">
              <q-item>
                <q-item-section avatar>
                  <q-avatar>
                    <img :src="data.avatar" />
                  </q-avatar>
                </q-item-section>

                <q-item-section>
                  <q-item-label>{{ data.username }}</q-item-label>
                </q-item-section>
              </q-item>
              <img :src="data.cover" />
              <q-card-actions>
                <q-btn
                  class="full-width"
                  color="secondary"
                  :href="data.downloadLink"
                  >Download</q-btn
                >
              </q-card-actions>
            </q-card>
          </transition>
        </div>
      </div>
    </div>
    <!-- <example-component
      title="Example component"
      active
      :todos="todos"
      :meta="meta"
    ></example-component> -->
  </q-page>
</template>

<script lang="ts">
// import { Todo, Meta } from 'components/models';
// import ExampleComponent from 'components/ExampleComponent.vue';
import { defineComponent, ref } from 'vue';
import clipboard from 'clipboardy';
import { api } from 'src/boot/axios';
import { useQuasar } from 'quasar';
import { setTimeout } from 'timers';

export default defineComponent({
  name: 'IndexPage',
  // components: { ExampleComponent },
  setup() {
    const $q = useQuasar();
    const url = ref<string>('');
    const paste = async () => {
      url.value = await clipboard.read();
    };
    const dataLoaded = ref<boolean>(false);
    const gettingUrlData = ref<boolean>(false);
    const data = ref(null);
    const getUrlData = async () => {
      dataLoaded.value = false;
      const urlSplit = url.value.split('/');
      const idWithParams = urlSplit[urlSplit.length - 1];
      const id = idWithParams.split('?')[0];
      if (urlSplit.length == 6 && parseInt(id)) {
        gettingUrlData.value = true;
        let res = await api.post('/', {
          action: 'getUrlData',
          id: id,
        });
        data.value = res.data;
        dataLoaded.value = true;
      } else {
        url.value = '';
        $q.notify('Please enter a valid TikTok video url.');
      }
      gettingUrlData.value = false;
    };
    return { url, dataLoaded, paste, gettingUrlData, data, getUrlData };
    // const todos = ref<Todo[]>([
    //   {
    //     id: 1,
    //     content: 'ct1'
    //   },
    //   {
    //     id: 2,
    //     content: 'ct2'
    //   },
    //   {
    //     id: 3,
    //     content: 'ct3'
    //   },
    //   {
    //     id: 4,
    //     content: 'ct4'
    //   },
    //   {
    //     id: 5,
    //     content: 'ct5'
    //   }
    // ]);
    // const meta = ref<Meta>({
    //   totalCount: 1200
    // });
    // return { todos, meta };
  },
});
</script>
