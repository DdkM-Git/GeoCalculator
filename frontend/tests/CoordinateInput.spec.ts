import { mount } from "@vue/test-utils";
import CoordinateInput from "../src/components/CoordinateInput.vue";

it("emits update events", async () => {
  const wrapper = mount(CoordinateInput);
  await wrapper.find("input").setValue(50);

  expect(wrapper.emitted()).toHaveProperty("update:lat");
});
