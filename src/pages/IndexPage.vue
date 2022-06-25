<template>
  <q-page class="row items-center justify-center">
    <div class="col q-pa-md q-gutter-sm">
      <header class="row items-center justify-center">
        <div class="col col-md-6 col-xs-12 q-pa-md q-gutter-sm">
          <h1 class="fit">TikTok Video Downloader</h1>
        </div>
      </header>
      <section class="row items-center justify-center" v-if="!dataLoaded">
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
      </section>
      <section class="row items-center justify-center" v-if="dataLoaded">
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
                    <q-img :src="data.avatar" spinner-color="secondary" />
                  </q-avatar>
                </q-item-section>
                <q-item-section>
                  <q-item-label>{{ data.username }}</q-item-label>
                </q-item-section>
              </q-item>
              <q-img :src="data.cover" spinner-color="secondary" />
              <q-card-actions>
                <q-btn
                  class="full-width"
                  color="secondary"
                  :href="data.downloadLink"
                  target="_blank"
                  >Download</q-btn
                >
              </q-card-actions>
            </q-card>
          </transition>
        </div>
      </section>
      <section class="row items-center justify-center">
        <div class="col col-md-6 col-xs-12 q-pa-md q-gutter-sm">
          <p>
            TikTok is a short video publishing software that allows you to
            create and publish short videos of 15 seconds to 1 minute. The
            creator of this program is Studio Bytedance China, which has
            released this program in two versions, China and Global. The name of
            the Chinese version of
            <a href="https://tiktok.com" rel="nofollow">TikTok</a> is Douyin.
            TikTok has a wide range of sound and video effects that can be used
            to create compelling clips.
          </p>
          <p>
            <strong>DonTikTok.com</strong> is a free online platform that helps
            you to download TikTok videos without watermark and with HD quality.
            You can use it on desktop PCs, phones (Android, iPhone), tablets
            (iPad, Android tablets). Go to TikTok app or website, copy a video
            URL and paste on above field and wait a few seconds and click on
            download Button. Congratulations, your TikTok video was downloaded
            so easily.
          </p>
        </div>
      </section>
      <article class="row items-center justify-center">
        <div class="col col-md-6 col-xs-12 q-pa-md q-gutter-sm">
          <h2>How to download TikTok videos?</h2>
          <p>
            Dontiktok.com is one of the best download tools from TikTok, to use
            this downloader, you don’t need to install software on your mobile
            phone, computer or tablet, all you have to do is have the TikTok
            video link. After the process is done by dontiktok.com, you are only
            one click away from downloading the video.
          </p>
          <h2>How download TikTok video without watermark?</h2>
          <p>
            Dontiktok.com download TikTok videos very fast and easy with no
            watermark and HD quality.
          </p>
          <h2>How to download TikTok videos on desktop PC?</h2>
          <p>With dontiktok.com you can download TikTok videos with PC.</p>
          <ul>
            <li>
              Go to TikTok in your chrome or any browser you like login to your
              account and find your target video
            </li>
            <li>Tap on video and copy its URL.</li>
            <li>Past URL to dontiktok downloader field.</li>
          </ul>
          <h2>How to download TikTok videos on Android smartphones?</h2>
          <p>
            With dontiktok.com you can download TikTok videos on Android phones.
          </p>
          <ul>
            <li>
              Go to TikTok App or website on your phone and find your video.
            </li>
            <li>Tap on share button and click on the copy link.</li>
            <li>Paste URL to dontiktok downloader fields</li>
          </ul>
          <h2>How to download TikTok videos on Android Tablets?</h2>
          <p>
            With dontiktok.com you can download TikTok videos on Android
            Tablets.
          </p>
          <ul>
            <li>
              Go to TikTok App or website on your Tablet and find your video.
            </li>
            <li>Tap on share button and click on the copy link.</li>
            <li>Paste URL to dontiktok downloader fields</li>
          </ul>
          <h2>Where are the download videos?</h2>
          <p>
            Your video downloaded into the default folder set by your browser.
          </p>
          <h2>How do I install TikTok app?</h2>
          <p>
            You can download the TikTok app from Google Play. But you should
            note that access to this app is limited in some parts of the world.
            Download TikTok
          </p>
          <h2>Can I share TikTok videos on Instagram?</h2>
          <p>
            If you want to publish interesting videos of TikTok to your
            Instagram, you must first download these videos from TikTok.
          </p>
        </div>
      </article>
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
import { useQuasar, exportFile, uid } from 'quasar';

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
    return {
      url,
      dataLoaded,
      paste,
      gettingUrlData,
      data,
      getUrlData,
    };
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
