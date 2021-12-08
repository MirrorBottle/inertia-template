<template>
  <div id="loader">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
      <rect x="19" y="19" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"/>
      </rect><rect x="40" y="19" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"/>
      </rect><rect x="61" y="19" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"/>
      </rect><rect x="19" y="40" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"/>
      </rect><rect x="61" y="40" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"/>
      </rect><rect x="19" y="61" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"/>
      </rect><rect x="40" y="61" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"/>
      </rect><rect x="61" y="61" width="20" height="20" fill="#4a3cdd">
        <animate attributeName="fill" values="#c7c7c7;#4a3cdd;#4a3cdd" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"/>
      </rect>
    </svg>
  </div>
  <iframe id="iframe" style="width: 100%; height: 80vh" src="/admin/filemanager-view" title="description"></iframe>
</template>

<script>
export default {
  mounted() {
    document.getElementById('iframe').addEventListener('load', function() {
      document.getElementById('loader').style.display = "none";
    })
  }
}
</script>

<style lang="scss" scoped>
  #loader {
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(255, 255, 255, 1);
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>