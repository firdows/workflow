const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"about":{"uri":"about","methods":["GET","HEAD"]},"ScrollPreservation":{"uri":"scroll-preservation","methods":["GET","HEAD"]},"register":{"uri":"register","methods":["GET","HEAD"]},"save_register":{"uri":"register","methods":["POST"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
